# Usa una imagen base de PHP con Apache
FROM php:7.4-apache

# Instala extensiones necesarias, incluyendo mysqli
RUN docker-php-ext-install mysqli

# Copia el contenido de la aplicación al directorio raíz del servidor web
COPY . /var/www/html/

# Habilita el módulo de reescritura de Apache
RUN a2enmod rewrite

# Establece permisos para el directorio de la aplicación
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Expone el puerto 80 para el tráfico HTTP
EXPOSE 80

# Inicia Apache en modo primer plano
CMD ["apache2-foreground"]
