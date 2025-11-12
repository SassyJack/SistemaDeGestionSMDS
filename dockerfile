# Imagen base: PHP 8.2 con Apache
FROM php:8.2-apache

# Habilita mod_rewrite para Laravel
RUN a2enmod rewrite

# Instala dependencias requeridas por los drivers de SQL Server
RUN apt-get update && apt-get install -y \
    gnupg2 \
    unixodbc \
    unixodbc-dev \
    libgssapi-krb5-2 \
    libssl-dev \
    curl \
    apt-transport-https \
    software-properties-common \
    git \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    && rm -rf /var/lib/apt/lists/*

# Agrega el repositorio oficial de Microsoft para Debian 12 (Bookworm)
RUN curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add - && \
    curl https://packages.microsoft.com/config/debian/12/prod.list > /etc/apt/sources.list.d/mssql-release.list

# Instala ODBC y herramientas de SQL Server
RUN apt-get update && ACCEPT_EULA=Y apt-get install -y \
    msodbcsql18 \
    mssql-tools18 \
    unixodbc-dev

# Instala y habilita los drivers PHP para SQL Server
RUN pecl install sqlsrv pdo_sqlsrv \
    && docker-php-ext-enable sqlsrv pdo_sqlsrv

# Copia Composer desde su imagen oficial
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copia el proyecto al contenedor
COPY . /var/www/html

# Establece el directorio de trabajo
WORKDIR /var/www/html

# Instala dependencias de Laravel (sin desarrollo)
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Ajusta permisos para Laravel
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache

# Exponer el puerto 80 (Apache)
EXPOSE 80

# Arranca Apache
CMD ["apache2-foreground"]