FROM php:8.2-cli

# Dépendances système
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    libsqlite3-dev \
    && rm -rf /var/lib/apt/lists/*

# Extensions PHP nécessaires
RUN docker-php-ext-install pdo pdo_sqlite

# Dossier de travail
WORKDIR /var/www/html

# Copier le projet
COPY . .

# Installer Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Installer dépendances Laravel
RUN composer install --no-dev --optimize-autoloader

# Permissions importantes
RUN chown -R www-data:www-data storage bootstrap/cache
RUN chmod -R 777 storage bootstrap/cache

# Créer le dossier et le fichier SQLite si nécessaire
RUN mkdir -p database && touch database/database.sqlite && chmod 777 database/database.sqlite

# Exposer le port pour Render
EXPOSE 10000

# Lancer les migrations et le serveur Laravel
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=$PORT
