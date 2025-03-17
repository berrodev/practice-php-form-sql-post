FROM php:8.1-apache

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    gnupg2 \
    apt-transport-https \
    curl \
    unixodbc \
    unixodbc-dev \
    libgssapi-krb5-2 \
    libaio1 \
    wget \
    unzip

# Agregar la clave GPG de Microsoft y el repositorio de MSSQL
RUN curl -fsSL https://packages.microsoft.com/keys/microsoft.asc | apt-key add - && \
    echo "deb [arch=amd64] https://packages.microsoft.com/debian/10/prod buster main" > /etc/apt/sources.list.d/mssql-release.list && \
    apt-get update && \
    ACCEPT_EULA=Y apt-get install -y msodbcsql18 mssql-tools

# Instalar dependencias para PHP
RUN docker-php-ext-install pdo

# Instalar SQLSRV y PDO_SQLSRV desde PECL
RUN pecl install sqlsrv pdo_sqlsrv && \
    docker-php-ext-enable sqlsrv pdo_sqlsrv

# Habilitar módulos de Apache (opcional si usas mod_rewrite)
RUN a2enmod rewrite

CMD ["apache2-foreground"]
