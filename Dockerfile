# Use the official PHP image as the base image
FROM php:8.2-apache


# Set the working directory in the container
WORKDIR /var/www/html

# Copy the application files into the container
COPY . /var/www/html

# Install necessary PHP extensions
RUN apt-get update && apt-get install -y \
    unzip \
    libzip-dev \
    && docker-php-ext-install zip \
    && php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && php -r "unlink('composer-setup.php');" \
    && composer install --no-scripts --no-autoloader --prefer-dist

RUN a2enmod rewrite
COPY ./docker/apache/000-default.conf /etc/apache2/sites-available/
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN php artisan key:generate

RUN composer dump-autoload \
    && php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

# Expose port 80
EXPOSE 80

# Define the entry point for the container
CMD ["apache2-foreground"]
