# Imagen base con PHP 8.2 y Apache
FROM php:8.2-apache

# Habilitar mod_rewrite (necesario para Laravel)
RUN a2enmod rewrite

# Instalar dependencias del sistema
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

# Instalar Node.js 18 (para compilar con Vite)
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copiar archivos del proyecto
COPY . /app

# Establecer directorio de trabajo
WORKDIR /app

# Instalar dependencias PHP y JS
RUN composer install --no-dev --optimize-autoloader --no-interaction && \
    npm install && npm run build

# Ajustar permisos
RUN chown -R www-data:www-data /app && \
    chmod -R 755 /app/storage && \
    chmod -R 755 /app/bootstrap/cache

# Configurar Apache para servir desde /app/public
RUN echo "<VirtualHost *:80>\n\
    DocumentRoot /app/public\n\
    <Directory /app/public>\n\
        AllowOverride All\n\
        Require all granted\n\
    </Directory>\n\
</VirtualHost>" > /etc/apache2/sites-available/000-default.conf

# Exponer el puerto 80
EXPOSE 80

# Comando por defecto
CMD ["apache2-foreground"]
