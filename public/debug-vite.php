<?php
// Debug file para verificar rutas de assets en Railway

echo "=== DEBUG INFO ===\n\n";

echo "APP_URL: " . env('APP_URL') . "\n";
echo "APP_ENV: " . env('APP_ENV') . "\n";
echo "PUBLIC_PATH: " . public_path() . "\n\n";

echo "=== MANIFEST CHECK ===\n";
$manifestPath = public_path('build/manifest.json');
if (file_exists($manifestPath)) {
    $manifest = json_decode(file_get_contents($manifestPath), true);
    echo "✓ Manifest existe\n";
    echo json_encode($manifest, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "\n";
} else {
    echo "✗ Manifest NO existe: $manifestPath\n";
}

echo "\n=== BUILD ASSETS CHECK ===\n";
$buildPath = public_path('build/assets');
if (is_dir($buildPath)) {
    echo "✓ Carpeta build/assets existe\n";
    $files = scandir($buildPath);
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            echo "  - $file (" . filesize("$buildPath/$file") . " bytes)\n";
        }
    }
} else {
    echo "✗ Carpeta build/assets NO existe\n";
}

echo "\n=== VITE HELPER TEST ===\n";
try {
    $css = app('vite')(['resources/css/app.css']);
    echo "CSS generado:\n" . $css . "\n";
} catch (\Exception $e) {
    echo "Error al generar CSS: " . $e->getMessage() . "\n";
}

try {
    $js = app('vite')(['resources/js/app.js']);
    echo "\nJS generado:\n" . $js . "\n";
} catch (\Exception $e) {
    echo "Error al generar JS: " . $e->getMessage() . "\n";
}
?>
