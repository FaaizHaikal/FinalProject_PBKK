FROM php:8.1-fpm

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    git \
    curl \
    postgresql-client \
    nodejs \
    npm

WORKDIR /var/www/html

COPY . .

RUN composer install --no-dev --optimize-autoloader
RUN npm install && npm run build

EXPOSE 9000 5173

CMD ["sh", "-c", "php artisan serve --host=0.0.0.0 --port=9000 & npm run dev"]
