FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    git \
    curl \
    postgresql-client \
    nodejs \
    npm \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html

COPY . .

RUN chown -R www-data:www-data /var/www/
USER www-data

RUN composer update
RUN composer install --no-dev --optimize-autoloader

RUN npm install && npm run build

USER root
RUN chmod -R 775 /var/www/html

EXPOSE 9000 5173

CMD ["sh", "-c", "php artisan serve --host=0.0.0.0 --port=9000 & npm run dev"]
