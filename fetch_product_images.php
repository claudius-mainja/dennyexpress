<?php

require_once __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;

echo "=== Fetching Product Images from dennyexpress.co.za ===\n\n";

$productsDir = public_path('images/products');
if (!is_dir($productsDir)) {
    mkdir($productsDir, 0755, true);
}

function fetchUrl(string $url): ?string
{
    static $ch = null;
    if ($ch === null) {
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
            CURLOPT_TIMEOUT => 30,
            CURLOPT_CONNECTTIMEOUT => 15,
            CURLOPT_HTTPHEADER => [
                'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
                'Accept-Language: en-US,en;q=0.5',
                'Referer: https://dennyexpress.co.za/',
            ],
        ]);
    }
    
    curl_setopt($ch, CURLOPT_URL, $url);
    $content = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
    if ($httpCode === 200 && $content) {
        return $content;
    }
    
    return null;
}

function downloadImage(string $url, string $savePath): bool
{
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
        CURLOPT_TIMEOUT => 30,
    ]);
    
    $content = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    if ($httpCode === 200 && $content && strlen($content) > 100) {
        file_put_contents($savePath, $content);
        return true;
    }
    
    return false;
}

function extractImageUrls(string $html, string $productName): array
{
    $images = [];
    
    if (preg_match('/class="woocommerce-product-gallery[^"]*"[^>]*>(.*?)<\/div>/is', $html, $galleryMatch)) {
        $galleryHtml = $galleryMatch[1];
        if (preg_match_all('/data-src=["\']([^"\']+\.(?:jpg|jpeg|png|webp|gif))["\']/i', $galleryHtml, $srcMatches)) {
            foreach ($srcMatches[1] as $src) {
                if (!in_array($src, $images) && !str_contains($src, 'prod_loading')) {
                    $images[] = $src;
                }
            }
        }
        if (preg_match_all('/data-large_image=["\']([^"\']+\.(?:jpg|jpeg|png|webp|gif))["\']/i', $galleryHtml, $largeMatches)) {
            foreach ($largeMatches[1] as $src) {
                if (!in_array($src, $images) && !str_contains($src, 'prod_loading')) {
                    array_unshift($images, $src);
                }
            }
        }
    }
    
    if (preg_match('/wp-content\/uploads\/[^"\']+\.(?:jpg|jpeg|png|webp)/i', $html, $imgMatch)) {
        $fullUrl = 'https://dennyexpress.co.za/' . $imgMatch[0];
        if (!in_array($fullUrl, $images) && !str_contains($fullUrl, 'prod_loading')) {
            array_unshift($images, $fullUrl);
        }
    }
    
    if (preg_match_all('/<img[^>]+src=["\']([^"\']+\.(?:jpg|jpeg|png|webp|gif))["\']/i', $html, $allImgMatches)) {
        foreach ($allImgMatches[1] as $imgUrl) {
            if (str_starts_with($imgUrl, '//')) {
                $imgUrl = 'https:' . $imgUrl;
            } elseif (!str_starts_with($imgUrl, 'http')) {
                $imgUrl = 'https://dennyexpress.co.za' . $imgUrl;
            }
            
            if (
                str_contains($imgUrl, 'wp-content/uploads') &&
                !str_contains($imgUrl, 'prod_loading') &&
                !str_contains($imgUrl, 'banner') &&
                !str_contains($imgUrl, 'logo') &&
                !in_array($imgUrl, $images)
            ) {
                array_unshift($images, $imgUrl);
            }
        }
    }
    
    return array_unique($images);
}

$products = Product::with('primaryImage')->get();
$total = count($products);
$success = 0;
$failed = 0;
$skipped = 0;

$mainFallbackImage = 'https://dennyexpress.co.za/wp-content/uploads/2026/02/POINT-OF-SALE-SYSTEM.jpg';
$localFallbackPath = $productsDir . '/pos-system-fallback.jpg';
$fallbackDownloaded = false;

if (!file_exists($localFallbackPath)) {
    echo "Downloading fallback POS image...\n";
    if (downloadImage($mainFallbackImage, $localFallbackPath)) {
        $fallbackDownloaded = true;
        echo "  Saved: images/products/pos-system-fallback.jpg\n\n";
    }
}

foreach ($products as $index => $product) {
    $productNum = $index + 1;
    echo "[{$productNum}/{$total}] Processing: {$product->name}\n";
    echo "  URL: {$product->original_source_url}\n";
    
    $existingImage = $product->primaryImage;
    if ($existingImage && $existingImage->path && !str_contains($existingImage->path, 'placehold.co')) {
        if (!str_contains($existingImage->path, 'http') && file_exists(public_path($existingImage->path))) {
            echo "  SKIP: Already has local image: {$existingImage->path}\n\n";
            $skipped++;
            continue;
        }
    }
    
    $html = null;
    if ($product->original_source_url) {
        $html = fetchUrl($product->original_source_url);
    }
    
    if (!$html) {
        echo "  WARN: Could not fetch product page\n";
        
        if ($fallbackDownloaded || file_exists($localFallbackPath)) {
            $relPath = 'images/products/pos-system-fallback.jpg';
            
            if ($existingImage) {
                $existingImage->update(['path' => $relPath]);
            } else {
                ProductImage::create([
                    'product_id' => $product->id,
                    'path' => $relPath,
                    'alt_text' => $product->name,
                    'is_primary' => true,
                    'sort_order' => 1,
                ]);
            }
            echo "  Using fallback image\n\n";
            $failed++;
        }
        continue;
    }
    
    $imageUrls = extractImageUrls($html, $product->name);
    
    if (empty($imageUrls)) {
        echo "  WARN: No images found in HTML, trying pattern matching...\n";
        
        $nameKey = strtolower($product->name);
        $patternMatch = null;
        
        if (str_contains($nameKey, 'scale') || str_contains($nameKey, 'weigh')) {
            $patternMatch = 'scale';
        } elseif (str_contains($nameKey, 'printer') || str_contains($nameKey, 'thermal')) {
            $patternMatch = 'printer';
        } elseif (str_contains($nameKey, 'scanner')) {
            $patternMatch = 'scanner';
        } elseif (str_contains($nameKey, 'cash drawer')) {
            $patternMatch = 'cash-drawer';
        } elseif (str_contains($nameKey, 'monitor')) {
            $patternMatch = 'monitor';
        } elseif (str_contains($nameKey, 'coin') || str_contains($nameKey, 'money counter')) {
            $patternMatch = 'money-counter';
        }
        
        if ($patternMatch) {
            $relPath = 'images/products/pos-system-fallback.jpg';
            if ($existingImage) {
                $existingImage->update(['path' => $relPath]);
            } else {
                ProductImage::create([
                    'product_id' => $product->id,
                    'path' => $relPath,
                    'alt_text' => $product->name,
                    'is_primary' => true,
                    'sort_order' => 1,
                ]);
            }
            echo "  Using fallback (type: {$patternMatch})\n\n";
            $failed++;
        }
        continue;
    }
    
    $primaryImageUrl = $imageUrls[0];
    echo "  Found primary image: {$primaryImageUrl}\n";
    
    $safeSlug = preg_replace('/[^a-z0-9_-]/i', '-', $product->slug);
    $safeSlug = trim($safeSlug, '-');
    
    $ext = pathinfo(parse_url($primaryImageUrl, PHP_URL_PATH), PATHINFO_EXTENSION);
    if (!$ext || strlen($ext) > 4) {
        $ext = 'jpg';
    }
    $ext = strtolower($ext);
    
    $filename = $safeSlug . '-primary.' . $ext;
    $savePath = $productsDir . '/' . $filename;
    $relPath = 'images/products/' . $filename;
    
    if (file_exists($savePath)) {
        $imageSize = getimagesize($savePath);
        if ($imageSize && $imageSize[0] > 100) {
            if ($existingImage) {
                $existingImage->update(['path' => $relPath]);
            } else {
                ProductImage::create([
                    'product_id' => $product->id,
                    'path' => $relPath,
                    'alt_text' => $product->name,
                    'is_primary' => true,
                    'sort_order' => 1,
                ]);
            }
            echo "  EXISTS: {$relPath}\n\n";
            $skipped++;
            continue;
        }
    }
    
    if (downloadImage($primaryImageUrl, $savePath)) {
        $imageSize = @getimagesize($savePath);
        if (!$imageSize || $imageSize[0] < 50) {
            echo "  WARN: Image too small or invalid, using fallback\n";
            unlink($savePath);
            $relPath = 'images/products/pos-system-fallback.jpg';
        }
        
        if ($existingImage) {
            $existingImage->update(['path' => $relPath]);
        } else {
            ProductImage::create([
                'product_id' => $product->id,
                'path' => $relPath,
                'alt_text' => $product->name,
                'is_primary' => true,
                'sort_order' => 1,
            ]);
        }
        echo "  SAVED: {$relPath}\n";
        $success++;
    } else {
        echo "  WARN: Download failed\n";
        $relPath = 'images/products/pos-system-fallback.jpg';
        if ($existingImage) {
            $existingImage->update(['path' => $relPath]);
        } else {
            ProductImage::create([
                'product_id' => $product->id,
                'path' => $relPath,
                'alt_text' => $product->name,
                'is_primary' => true,
                'sort_order' => 1,
            ]);
        }
        $failed++;
    }
    
    echo "\n";
    usleep(200000);
}

echo "=== Final Summary ===\n";
echo "Total products: {$total}\n";
echo "Successfully downloaded: {$success}\n";
echo "Already had valid images: {$skipped}\n";
echo "Used fallback (failed to download/fetch): {$failed}\n";
