#!/usr/bin/env bash
# Actualizar paquetes e instalar dependencias básicas
apt-get update && apt-get install -y unzip

# Mostrar la versión de PHP instalada
php -v

# Instalar Composer (si lo usas)
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer

# Instalar dependencias con Composer (si es necesario)
if [ -f "composer.json" ]; then
    composer install --no-dev --optimize-autoloader
fi

# Ajustar permisos para almacenamiento y caché
chmod -R 775 storage bootstrap/cache

# Mensaje de éxito
echo "Entorno configurado correctamente."