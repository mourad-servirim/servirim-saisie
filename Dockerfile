# 🔥 Base PHP CLI
FROM php:8.2-cli

# Dépendances système
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    libsqlite3-dev \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Extensions PHP nécessaires pour Laravel + SQLite
RUN docker-php-ext-install pdo pdo_sqlite

# Dossier de travail
WORKDIR /var/www/html

# Copier le projet
COPY . .

# Installer Composer
RUN curl -sS https://getcomposer.org/installer | php \
    -- --install-dir=/usr/local/bin --filename=composer

# Installer dépendances Laravel
RUN composer install --no-dev --optimize-autoloader

# Permissions (IMPORTANT)
RUN chown -R www-data:www-data storage bootstrap/cache

# Port utilisé par Render
EXPOSE 10000

# 🔥 Créer le fichier SQLite automatiquement et lancer Laravel
CMD mkdir -p /var/www/html/database && \
    touch /var/www/html/database/database.sqlite && \
    chmod 777 /var/www/html/database/database.sqlite && \
    php artisan migrate --force && \
    php artisan serve --host=0.0.0.0 --port=$PORT
