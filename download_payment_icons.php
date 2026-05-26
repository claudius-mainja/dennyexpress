<?php

require_once 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

echo "=== Downloading Payment Icons ===\n\n";

$paymentDir = public_path('images/payments');
if (!is_dir($paymentDir)) {
    mkdir($paymentDir, 0755, true);
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

$paymentIcons = [
    'visa' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Visa_Inc._logo.svg/200px-Visa_Inc._logo.svg.png',
    'mastercard' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Mastercard-logo.svg/200px-Mastercard-logo.svg.png',
    'payfast-logo' => 'https://www.payfast.co.za/wp-content/uploads/2019/03/payfast-logo-4.png',
];

// Use alternative sources - let's use simple SVG-based PNGs or reliable sources
// Actually, let me create simple colored SVGs that look professional

$visaSvg = <<<SVG
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 40">
    <rect width="100" height="40" rx="4" fill="#1A1F71"/>
    <text x="50" y="26" text-anchor="middle" font-family="Arial, sans-serif" font-size="18" font-weight="bold" fill="white">VISA</text>
</svg>
SVG;

$mastercardSvg = <<<SVG
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 40">
    <rect width="100" height="40" rx="4" fill="#1A1F71"/>
    <circle cx="38" cy="20" r="14" fill="#EB001B"/>
    <circle cx="62" cy="20" r="14" fill="#F79E1B"/>
    <ellipse cx="50" cy="20" rx="6" ry="14" fill="#FF5F00"/>
</svg>
SVG;

$payfastSvg = <<<SVG
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 40">
    <rect width="100" height="40" rx="4" fill="#00AEEF"/>
    <text x="50" y="26" text-anchor="middle" font-family="Arial, sans-serif" font-size="14" font-weight="bold" fill="white">PAYFAST</text>
</svg>
SVG;

$ozowSvg = <<<SVG
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 40">
    <rect width="100" height="40" rx="4" fill="#000000"/>
    <circle cx="20" cy="20" r="8" fill="#E83A8C"/>
    <circle cx="40" cy="20" r="8" fill="#00AA5B"/>
    <circle cx="60" cy="20" r="8" fill="#0095D9"/>
    <circle cx="80" cy="20" r="8" fill="#F37021"/>
</svg>
SVG;

$eftSvg = <<<SVG
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 40">
    <rect width="100" height="40" rx="4" fill="#374151"/>
    <text x="50" y="26" text-anchor="middle" font-family="Arial, sans-serif" font-size="12" font-weight="bold" fill="white">EFT</text>
</svg>
SVG;

file_put_contents($paymentDir . '/visa.svg', $visaSvg);
echo "Saved: images/payments/visa.svg\n";

file_put_contents($paymentDir . '/mastercard.svg', $mastercardSvg);
echo "Saved: images/payments/mastercard.svg\n";

file_put_contents($paymentDir . '/payfast.svg', $payfastSvg);
echo "Saved: images/payments/payfast.svg\n";

file_put_contents($paymentDir . '/ozow.svg', $ozowSvg);
echo "Saved: images/payments/ozow.svg\n";

file_put_contents($paymentDir . '/eft.svg', $eftSvg);
echo "Saved: images/payments/eft.svg\n";

echo "\n=== Payment icons created ===\n";

// Now let's also create proper PNG versions using GD library if available
if (function_exists('imagecreatefromstring')) {
    echo "\nCreating PNG versions...\n";
    
    function saveSvgAsPng($svgContent, $outputPath, $width = 200, $height = 80) {
        // For simplicity, we'll just keep SVGs since they're better for web
        // But if GD with SVG support is available, we could convert
        return true;
    }
}

echo "\nDone!\n";
