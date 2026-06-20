FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libpng-dev libonig-dev curl libpq-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql zip gd

# Installer Node.js (pour Vite)
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

RUN composer install --no-dev --optimize-autoloader

RUN npm install && npm run build

RUN php artisan key:generate --force || true

EXPOSE 10000
CMD php artisan serve --host=0.0.0.0 --port=10000