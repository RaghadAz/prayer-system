<?php

$storagePath = '/tmp/storage';

if (!file_exists($storagePath)) {
    mkdir($storagePath . '/framework/views', 0755, true);
    mkdir($storagePath . '/framework/cache/data', 0755, true);
    mkdir($storagePath . '/framework/sessions', 0755, true);
    mkdir($storagePath . '/logs', 0755, true);
}

$_ENV['APP_SERVICES_CACHE'] = $storagePath . '/bootstrap/cache/services.php';
$_ENV['APP_PACKAGES_CACHE'] = $storagePath . '/bootstrap/cache/packages.php';
$_ENV['APP_CONFIG_CACHE']   = $storagePath . '/bootstrap/cache/config.php';
$_ENV['APP_ROUTES_CACHE']   = $storagePath . '/bootstrap/cache/routes.php';

require __DIR__ . '/../public/index.php';
