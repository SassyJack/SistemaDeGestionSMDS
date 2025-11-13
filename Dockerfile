# Imagen base con PHP 8.2 y Apache
FROM php:8.2-apache

# Habilitar mod_rewrite (necesario para Laravel)
RUN a2enmod rewrite

# Instalar dependencias del sistema necesarias
RUN apt-get update && apt-get install -y \
    git \
    curl \
    unzip \
    zip \
    libpq-dev \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    gnupg2 \
    && docker-php-ext-install pdo_pgsql pgsql zip bcmath

# Instalar Node.js 18 (para compilar Vite)
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copiar el proyecto al contenedor
COPY . /var/www/html

# Establecer el directorio de trabajo
WORKDIR /var/www/html

# Instalar dependencias PHP y JS, compilar assets
RUN composer install --no-dev --optimize-autoloader --no-interaction && \
    npm install && npm run build && \
    php artisan config:clear && php artisan route:clear && php artisan view:clear

# Asignar permisos correctos
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html/storage && \
    chmod -R 755 /var/www/html/bootstrap/cache

# Configurar Apache para servir desde /public y definir ServerName
RUN echo "<VirtualHost *:80>\n\
    ServerName localhost\n\
    DocumentRoot /var/www/html/public\n\
    <Directory /var/www/html/public>\n\
        AllowOverride All\n\
        Require all granted\n\
    </Directory>\n\
</VirtualHost>" > /etc/apache2/sites-available/000-default.conf

# Exponer el puerto 80
EXPOSE 80

# Comando de inicio
CMD ["apache2-foreground"]
