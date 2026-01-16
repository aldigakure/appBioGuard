#!/bin/sh

# Cache konfigurasi
php artisan config:cache
php artisan route:cache

# Jalankan PHP-FPM di background
php-fpm -D

# Jalankan Nginx di foreground
nginx -g "daemon off;"