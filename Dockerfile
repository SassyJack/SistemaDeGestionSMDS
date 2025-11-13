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

# Instalar Node.js 18 (para Vite)
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs

# Instalar Composer (desde imagen oficial)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copiar todos los archivos del proyecto
COPY . /var/www/html

# Establecer el directorio de trabajo
WORKDIR /var/www/html

# 🔧 Establecer variables de entorno (Railway usa APP_ENV=production)
ENV APP_ENV=production
ENV APP_DEBUG=false
ENV PORT=8080

# Instalar dependencias PHP y JS
RUN composer install --no-dev --optimize-autoloader --no-interaction && \
    npm install && npm run build

# Ajustar permisos para Laravel
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html/storage && \
    chmod -R 755 /var/www/html/bootstrap/cache

# 🔹 Configurar Apache para servir Laravel desde /public
RUN echo "<VirtualHost *:8080>\n\
    ServerName localhost\n\
    DocumentRoot /var/www/html/public\n\
    <Directory /var/www/html/public>\n\
        AllowOverride All\n\
        Require all granted\n\
    </Directory>\n\
    ErrorLog /var/log/apache2/error.log\n\
    CustomLog /var/log/apache2/access.log combined\n\
</VirtualHost>" > /etc/apache2/sites-available/000-default.conf && \
    sed -i 's/Listen 80/Listen 8080/' /etc/apache2/ports.conf

# 🩺 Healthcheck para Railway (necesario para marcar el contenedor como "OK")
HEALTHCHECK --interval=30s --timeout=5s --start-period=10s --retries=3 \
  CMD curl -f http://localhost:8080/login || exit 1

# Exponer el puerto que Railway espera
EXPOSE 8080

# Comando de inicio
CMD ["apache2-foreground"]
