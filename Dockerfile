FROM php:8.1-fpm

RUN apt-get update && apt-get install -y \
    git curl libpng-dev libjpeg-dev libfreetype6-dev zip unzip libonig-dev libxml2-dev

RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

# Copy .env.example ke .env agar artisan bisa jalan
RUN cp .env.example .env

RUN composer install --no-dev --optimize-autoloader

RUN php artisan key:generate --force
RUN php artisan config:cache && php artisan route:cache && php artisan view:cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

CMD php artisan serve --host=0.0.0.0 --port=${PORT}

EXPOSE 8000
