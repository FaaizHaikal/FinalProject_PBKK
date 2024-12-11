#!/bin/bash
set -e

# Wait for db
until nc -z -v -w30 db 5432
do
  echo "Waiting for database connection..."
  sleep 1
done

if [ ! -f /var/www/html/.env ]; then
  cp /var/www/html/.env.example /var/www/html/.env

  sed -i "s/DB_CONNECTION=mysql/DB_CONNECTION=pgsql/g" /var/www/html/.env
  sed -i "s/DB_PORT=3306/DB_PORT=5432/g" /var/www/html/.env
  sed -i "s/DB_HOST=127.0.0.1/DB_HOST=db/g" /var/www/html/.env
  sed -i "s/DB_USERNAME=root/DB_USERNAME=postgres/g" /var/www/html/.env
  sed -i "s/DB_PASSWORD=/DB_PASSWORD=secret/g" /var/www/html/.env

fi

composer install --no-interaction --prefer-dist --optimize-autoloader

if [ ! -f /var/www/html/.env ]; then
    php artisan key:generate
fi

php artisan migrate --force

exec "$@"
