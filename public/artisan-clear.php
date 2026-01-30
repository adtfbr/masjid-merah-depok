<?php

/**
 * WARNING:
 * Hapus file ini setelah digunakan!
 */

use Illuminate\Contracts\Console\Kernel;

define('LARAVEL_START', microtime(true));

// Load autoload
require __DIR__ . '/../vendor/autoload.php';

// Bootstrap app
$app = require_once __DIR__ . '/../bootstrap/app.php';

$kernel = $app->make(Kernel::class);

// List command yang mau dijalankan
$commands = [
    'route:clear',
    'view:clear',
    'config:clear',
    'cache:clear',
];

echo "<pre>";

foreach ($commands as $command) {
    echo "Running: php artisan {$command}\n";
    $kernel->call($command);
    echo $kernel->output() . "\n";
}

echo "✅ Semua cache berhasil dibersihkan.\n";
echo "</pre>";
