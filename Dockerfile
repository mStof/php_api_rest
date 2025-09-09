# Escolhe a imagem oficial do PHP com Apache
FROM php:8.2-apache

# Atualiza os pacotes e instala dependências necessárias
RUN apt-get update && apt-get install -y \
    libonig-dev \
    libzip-dev \
    unzip \
    git \
    && docker-php-ext-install mysqli pdo pdo_mysql \
    && docker-php-ext-enable mysqli

# Copia o código da aplicação para o container
COPY . /var/www/html/

# Permissões (ajuste se precisar)
RUN chown -R www-data:www-data /var/www/html

# Expondo a porta padrão do Apache
EXPOSE 80

# Comando padrão para rodar o Apache
CMD ["apache2-foreground"]
