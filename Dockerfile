FROM node:18-alpine as frontend
WORKDIR /app
COPY package*.json ./
RUN npm ci
COPY . .
RUN npm run production

FROM php:8.0-fpm-alpine

RUN apk add --no-cache \
    freetype-dev \
    jpeg-dev \
    libpng-dev \
    libzip-dev \
    oniguruma-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j"$(nproc)" gd pdo_mysql mbstring zip

WORKDIR /var/www/html
COPY . .

COPY --from=frontend /app/public/js ./public/js
COPY --from=frontend /app/public/css ./public/css
COPY --from=frontend /app/public/mix-manifest.json ./public/mix-manifest.json

RUN chown -R www-data:www-data storage bootstrap/cache

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN composer install --no-dev --optimize-autoloader

EXPOSE 9000
CMD ["php-fpm"]
