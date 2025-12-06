FROM php:8.2-fpm

ARG user
ARG uid

ENV DEBIAN_FRONTEND=noninteractive

# Copy composer files first for layer caching
COPY composer.json /var/www/
WORKDIR /var/www

# Install system packages and Chrome (not Chromium)
# Install system packages and Chrome using GPG key (NO apt-key)
# Install system packages, build deps, Chrome (via signed key), fonts and Node later
RUN apt-get update && apt-get install -y --no-install-recommends \
    ca-certificates wget gnupg git unzip curl zip build-essential pkg-config \
    libpng-dev libzip-dev zlib1g-dev libonig-dev libjpeg62-turbo-dev libfreetype6-dev \
    libnss3 libatk1.0-0 libxss1 libasound2 libgbm1 libgtk-3-0 libx11-6 \
    fonts-liberation fonts-dejavu-core fonts-noto-color-emoji \
    libxrandr2 libxdamage1 libxcomposite1 libxcursor1 libxi6 libxext6 \
    libpangocairo-1.0-0 libcairo2 libpango-1.0-0 libxrender1 \
    chromium \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Configure & install php extensions (gd needs freetype/jpeg headers)
RUN docker-php-ext-configure gd --with-jpeg --with-freetype || true
RUN docker-php-ext-install pdo_mysql mbstring bcmath gd pcntl exif zip


# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring bcmath gd pcntl exif

# Install Node 22 (latest LTS you want)
RUN curl -fsSL https://deb.nodesource.com/setup_22.x | bash - \
    && apt-get install -y nodejs

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Create non-root user
RUN groupadd -g $uid $user \
    && useradd -u $uid -ms /bin/bash -g $user -G www-data,audio,video $user

# Copy app with correct ownership
COPY --chown=$user:www-data . /var/www

# Set permissions for Laravel storage & cache
RUN chown -R ${user}:www-data /var/www \
    && find /var/www -type f -exec chmod 644 {} \; \
    && find /var/www -type d -exec chmod 755 {} \; \
    && chmod -R ug+rwx storage bootstrap/cache


COPY ./entrypoint.sh /usr/local/bin/docker-laravel-entrypoint
RUN chmod +x /usr/local/bin/docker-laravel-entrypoint

RUN npm install -g puppeteer --unsafe-perm=true --allow-root

# Use system Chrome for Puppeteer
ENV PUPPETEER_SKIP_CHROMIUM_DOWNLOAD=true
ENV PUPPETEER_EXECUTABLE_PATH=/usr/bin/chromium
USER $user

EXPOSE 9000
ENTRYPOINT ["/usr/local/bin/docker-laravel-entrypoint"]
