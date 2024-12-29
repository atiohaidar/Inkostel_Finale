# Gunakan image PHP yang sesuai dengan versi Laravel Anda
FROM php:8.1-fpm

# Set working directory dalam container
WORKDIR /var/www/html

# Copy seluruh file proyek ke dalam container

COPY . .
# Install dependensi PHP yang dibutuhkan Laravel

RUN curl -sS https://getcomposer.org/installer -o composer-setup.php
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
RUN apt-get update && apt-get install -y git
RUN composer
RUN composer install --no-scripts --no-autoloader


# Set permission untuk direktori storage
RUN chown -R www-data:www-data storage

# Expose port untuk aplikasi Laravel
EXPOSE 9000

# Command default saat container dijalankan
CMD ["php", "artisan" , "serve", "--host=0.0.0.0" , "--port=9000"]
# CMD ["php", "-S", "0.0.0.0:9000", "-t", "public"]