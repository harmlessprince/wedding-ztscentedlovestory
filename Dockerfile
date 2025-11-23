FROM php:8.2-fpm

ARG user
ARG uid

# Copy composer.lock and composer.json
COPY composer.lock composer.json /var/www/

# Set working directory
WORKDIR /var/www
RUN apt-get update && apt-get install -y \
    git \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    curl \
    zlib1g-dev \
    libpq-dev \
    libzip-dev \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*


# Install dependencies
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Node.js 22 and npm
RUN curl -fsSL https://deb.nodesource.com/setup_22.x | bash - \
    && apt-get install -y nodejs

RUN echo "Node: " && node -v
RUN echo "NPM: " && npm -v

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add user for the Laravel application
#RUN groupadd -g $uid $user
#RUN useradd -u $uid -ms /bin/bash -g www-data $user

# Copy existing application directory permissions
COPY --chown=$user:www-data . /var/www

# Change current user to www
USER $user

# Expose port 9000 and start php-fpm server
EXPOSE 9000

CMD ["php-fpm"]
