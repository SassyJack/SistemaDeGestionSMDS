# Usa la imagen oficial de PHP con Apache
FROM php:8.2-apache

# Habilita mod_rewrite para Laravel
RUN a2enmod rewrite

# Instala dependencias del sistema y extensiones necesarias de PHP
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    zip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    curl \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath gd

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copia los archivos de la aplicación al contenedor
COPY . /var/www/html

# Establece el directorio de trabajo
WORKDIR /var/www/html

# Asigna los permisos necesarios
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache

# Instala dependencias de PHP
RUN composer install --optimize-autoloader --no-interaction --no-dev

# Expone el puerto 80
EXPOSE 80
