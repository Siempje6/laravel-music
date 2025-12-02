#!/bin/bash

# ==============================
# Run Laravel locally met lokale PHP
# ==============================

# Pad naar lokale PHP (download PHP 8.2.x tar.gz en pak uit in ./php)
PHP_BIN="./php/bin/php"

if [ ! -f "$PHP_BIN" ]; then
    echo "⚠️ PHP binary niet gevonden! Download PHP 8.2 of hoger en pak uit in ./php"
    exit 1
fi

# Check PHP versie
PHP_VERSION=$($PHP_BIN -r 'echo PHP_VERSION;')
echo "📌 Huidige PHP-versie: $PHP_VERSION"

PHP_MAJOR=$(echo $PHP_VERSION | cut -d. -f1)
PHP_MINOR=$(echo $PHP_VERSION | cut -d. -f2)

if [ "$PHP_MAJOR" -lt 8 ] || { [ "$PHP_MAJOR" -eq 8 ] && [ "$PHP_MINOR" -lt 1 ]; }; then
    echo "❌ PHP >= 8.1 vereist. Update de lokale PHP versie in ./php"
    exit 1
fi

# Composer dependencies installeren
echo "📦 Composer dependencies installeren..."
$PHP_BIN composer install

# Laravel server starten
echo "🚀 Laravel server starten..."
$PHP_BIN artisan serve
