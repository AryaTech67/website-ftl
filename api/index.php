<?php
/**
 * Vercel Serverless Entry Router for For The Little Website
 */

// Parse the requested path
$uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
$uri = trim($uri, '/');

// Clean query string / trailing slashes
if (empty($uri) || $uri === 'index.php') {
    require_once __DIR__ . '/../index.php';
    exit;
}

// Check for direct files in root
$target_file = __DIR__ . '/../' . $uri;

// 1. If explicit .php requested (e.g. /produk.php)
if (file_exists($target_file) && is_file($target_file) && pathinfo($target_file, PATHINFO_EXTENSION) === 'php') {
    require_once $target_file;
    exit;
}

// 2. If clean URL requested (e.g. /produk -> /produk.php)
if (file_exists($target_file . '.php') && is_file($target_file . '.php')) {
    require_once $target_file . '.php';
    exit;
}

// 3. If API endpoint requested (e.g. /api/ongkir)
if ($uri === 'api/ongkir' || $uri === 'api/ongkir.php') {
    require_once __DIR__ . '/ongkir.php';
    exit;
}

// Fallback to index.php
if (file_exists(__DIR__ . '/../index.php')) {
    require_once __DIR__ . '/../index.php';
    exit;
}

http_response_code(404);
echo "404 Page Not Found";
