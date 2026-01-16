# --- Stage 1: Assets ---
FROM node:20-alpine AS assets
WORKDIR /app
COPY . .
RUN npm install && npm run build

# --- Stage 2: App ---
FROM php:8.2-fpm-alpine

# Install system dependencies & PHP extensions (MySQL)
RUN apk add --no-cache \
    nginx \
    libpng-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install pdo_mysql bcmath gd zip

WORKDIR /var/www/html

# Copy project files & assets
COPY . .
COPY --from=assets /app/public/build ./public/build

# Install Composer
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer
RUN composer install --no-interaction --optimize-autoloader --no-dev

# Copy Konfigurasi Nginx & Entrypoint
COPY docker/nginx.conf /etc/nginx/http.d/default.conf
COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Permissions
RUN chown -R www-data:www-data storage bootstrap/cache

EXPOSE 8080

ENTRYPOINT ["entrypoint.sh"]