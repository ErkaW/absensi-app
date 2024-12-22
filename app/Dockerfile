# Gunakan image dasar PHP dengan Apache
FROM php:8.0-apache

# Set working directory dalam container
WORKDIR /var/www/html

# Salin semua file dari direktori lokal ke dalam container
COPY . /var/www/html

# Create the directory for logs
RUN mkdir -p /var/log/php && chown -R www-data:www-data /var/log/php

# Give write permissions to the directory for the web server user
RUN chmod -R 777 /var/log/php

# Instal ekstensi PHP yang dibutuhkan (contoh: mysqli)
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Berikan izin pada direktori (opsional jika file memerlukan izin khusus)
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Aktifkan modul Apache rewrite jika diperlukan
RUN a2enmod rewrite

# Port default untuk Apache
EXPOSE 80

# Jalankan Apache sebagai command default
CMD ["apache2-foreground"]
