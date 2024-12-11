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

RUN chown -R root /var/www/
RUN find /var/www/html -type d -exec chmod u+rwx {} +
RUN find /var/www/html -type f -exec chmod u+rw {} +

RUN composer update
RUN composer install --no-dev --optimize-autoloader

RUN npm install && npm run build

EXPOSE 9000 5173

CMD ["sh", "-c", "php artisan serve --host=0.0.0.0 --port=9000 & npm run dev"]
