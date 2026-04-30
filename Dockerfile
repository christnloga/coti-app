# We use the official PHP 5.6 image with Apache
FROM php:5.6-apache

# Install legacy extensions often required by older apps
# mysql is for very old apps, mysqli/pdo_mysql for slightly "newer" old apps
RUN docker-php-ext-install mysql mysqli pdo_mysql

# Enable Apache mod_rewrite (crucial for many PHP frameworks)
RUN a2enmod rewrite

# Copy your app code into the container
COPY ./src /var/www/html/

# Set permissions so the server can read the files
RUN chown -R www-data:www-data /var/www/html