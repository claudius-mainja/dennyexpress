<?php

require_once 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Product;
use App\Models\ProductImage;

echo "=== Fetching Missing Product Images ===\n\n";

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
    
    if ($httpCode === 200 && $content && strlen($content) > 500) {
        file_put_contents($savePath, $content);
        return true;
    }
    
    return false;
}

// Get products that have fallback images
$products = Product::with('primaryImage')->get();
$total = $products->count();
$updated = 0;

$mainFallbackImage = 'images/products/pos-system-main.jpg';

foreach ($products as $p) {
    $img = $p->primaryImage;
    
    // Check if using fallback
    $isFallback = false;
    if ($img) {
        $path = $img->path;
        if (str_contains($path, 'pos-system-fallback') || str_contains($path, 'pos-system-main')) {
            $isFallback = true;
        }
    } else {
        $isFallback = true;
    }
    
    if (!$isFallback) {
        continue;
    }
    
    echo "Processing: {$p->name}\n";
    echo "  URL: {$p->original_source_url}\n";
    
    if (empty($p->original_source_url)) {
        echo "  SKIP: No source URL\n\n";
        continue;
    }
    
    // Try to fetch the product page
    $html = fetchUrl($p->original_source_url);
    if (!$html) {
        echo "  WARN: Could not fetch page\n\n";
        continue;
    }
    
    // Extract images more aggressively
    $imageUrls = [];
    
    // Look for WooCommerce gallery images
    if (preg_match('/class="woocommerce-product-gallery[^"]*"[^>]*>(.*?)<\/div>/is', $html, $galleryMatch)) {
        $galleryHtml = $galleryMatch[1];
        
        // data-src attribute
        if (preg_match_all('/data-src=["\']([^"\']+\.(?:jpg|jpeg|png|webp))["\']/i', $galleryHtml, $srcMatches)) {
            foreach ($srcMatches[1] as $src) {
                if (!in_array($src, $imageUrls) && !str_contains($src, 'prod_loading')) {
                    $imageUrls[] = $src;
                }
            }
        }
        
        // data-large_image
        if (preg_match_all('/data-large_image=["\']([^"\']+\.(?:jpg|jpeg|png|webp))["\']/i', $galleryHtml, $largeMatches)) {
            foreach ($largeMatches[1] as $src) {
                if (!in_array($src, $imageUrls) && !str_contains($src, 'prod_loading')) {
                    array_unshift($imageUrls, $src);
                }
            }
        }
        
        // src= in gallery
        if (preg_match_all('/<img[^>]+src=["\']([^"\']+\.(?:jpg|jpeg|png|webp))["\']/i', $galleryHtml, $imgMatches)) {
            foreach ($imgMatches[1] as $src) {
                if (str_contains($src, 'wp-content/uploads') && !str_contains($src, 'prod_loading') && !in_array($src, $imageUrls)) {
                    array_unshift($imageUrls, $src);
                }
            }
        }
    }
    
    // Also search the entire page for product images
    if (preg_match_all('/<img[^>]+src=["\']([^"\']+\.(?:jpg|jpeg|png|webp))["\']/i', $html, $allImgMatches)) {
        foreach ($allImgMatches[1] as $imgUrl) {
            // Fix relative URLs
            if (str_starts_with($imgUrl, '//')) {
                $imgUrl = 'https:' . $imgUrl;
            } elseif (!str_starts_with($imgUrl, 'http')) {
                $imgUrl = 'https://dennyexpress.co.za' . $imgUrl;
            }
            
            // Filter for product images only
            if (
                str_contains($imgUrl, 'wp-content/uploads') &&
                !str_contains($imgUrl, 'prod_loading') &&
                !str_contains($imgUrl, 'banner') &&
                !str_contains($imgUrl, 'logo') &&
                !in_array($imgUrl, $imageUrls)
            ) {
                $imageUrls[] = $imgUrl;
            }
        }
    }
    
    // Also look for og:image
    if (preg_match('/<meta[^>]+property=["\']og:image["\'][^>]+content=["\']([^"\']+)["\']/i', $html, $ogMatch)) {
        $ogImage = $ogMatch[1];
        if (str_starts_with($ogImage, '//')) {
            $ogImage = 'https:' . $ogImage;
        }
        if (!in_array($ogImage, $imageUrls)) {
            array_unshift($imageUrls, $ogImage);
        }
    }
    
    if (empty($imageUrls)) {
        echo "  WARN: No images found, keeping existing\n\n";
        continue;
    }
    
    echo "  Found " . count($imageUrls) . " potential images\n";
    
    // Try to download the first valid image
    $downloaded = false;
    foreach ($imageUrls as $imageUrl) {
        // Fix URL
        if (str_starts_with($imageUrl, '//')) {
            $imageUrl = 'https:' . $imageUrl;
        } elseif (!str_starts_with($imageUrl, 'http')) {
            $imageUrl = 'https://dennyexpress.co.za' . $imageUrl;
        }
        
        echo "  Trying: $imageUrl\n";
        
        $safeSlug = preg_replace('/[^a-z0-9_-]/i', '-', $p->slug);
        $safeSlug = trim($safeSlug, '-');
        
        $ext = pathinfo(parse_url($imageUrl, PHP_URL_PATH), PATHINFO_EXTENSION);
        if (!$ext || strlen($ext) > 4) {
            $ext = 'jpg';
        }
        $ext = strtolower($ext);
        
        $filename = $safeSlug . '-primary.' . $ext;
        $savePath = $productsDir . '/' . $filename;
        $relPath = 'images/products/' . $filename;
        
        if (downloadImage($imageUrl, $savePath)) {
            // Verify the image
            $imageSize = @getimagesize($savePath);
            if ($imageSize && $imageSize[0] >= 50) {
                echo "  SUCCESS: Saved to $relPath\n";
                
                // Update database
                $existing = $p->primaryImage;
                if ($existing) {
                    $existing->update(['path' => $relPath]);
                } else {
                    ProductImage::create([
                        'product_id' => $p->id,
                        'path' => $relPath,
                        'alt_text' => $p->name,
                        'is_primary' => true,
                        'sort_order' => 1,
                    ]);
                }
                
                $updated++;
                $downloaded = true;
                break;
            } else {
                echo "  WARN: Invalid image, trying next\n";
                @unlink($savePath);
            }
        }
    }
    
    if (!$downloaded) {
        echo "  WARN: All downloads failed, keeping existing\n";
    }
    
    echo "\n";
    usleep(100000);
}

echo "=== Summary ===\n";
echo "Total products checked: $total\n";
echo "Products updated with new images: $updated\n";
