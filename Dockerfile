FROM php:8.2-fpm

ARG user
ARG uid


# Prevent interactive prompts
ENV DEBIAN_FRONTEND=noninteractive

# Copy composer.lock and composer.json
COPY composer.lock composer.json /var/www/

# Set working directory
WORKDIR /var/www
# Install system packages, Node.js, Chromium and fonts + libs Puppeteer needs
RUN apt-get update && apt-get install -y --no-install-recommends \
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
    ca-certificates \
    gnupg \
    wget \
    # Puppeteer/Chromium required libs (common)
    libnss3 \
    libatk1.0-0 \
    libxss1 \
    libasound2 \
    libgbm1 \
    libgtk-3-0 \
    libx11-6 \
    fonts-liberation \
    fonts-dejavu-core \
    fonts-noto-color-emoji \
    chromium \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*
#RUN apt-get update && apt-get install -y \
#    git \
#    libpng-dev \
#    libonig-dev \
#    libxml2-dev \
#    zip \
#    unzip \
#    curl \
#    zlib1g-dev \
#    libpq-dev \
#    libzip-dev \
#    && apt-get clean \
#    && rm -rf /var/lib/apt/lists/*


# Install dependencies
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Node.js 22 and npm
RUN curl -fsSL https://deb.nodesource.com/setup_22.x | bash - \
    && apt-get install -y nodejs

# Show versions (optional)
RUN echo "Node: " && node -v || true
RUN echo "NPM: " && npm -v || true
RUN echo "Chromium: " && chromium --version || true


# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add user for the Laravel application
RUN groupadd -g $uid $user \
    && useradd -u $uid -ms /bin/bash -g $user $user

# Copy existing application directory permissions
COPY --chown=$user:www-data . /var/www

#RUN chown -R $USER:www-data /var/www
#RUN chown -R $USER:www-data /var/www/node_modules
#RUN find /var/www -type f -exec chmod 644 {} \;
#RUN find /var/www -type d -exec chmod 755 {} \;
#RUN chgrp -R www-data storage bootstrap/cache
#RUN chmod -R ug+rwx storage bootstrap/cache
RUN chown -R ${user}:www-data /var/www \
    && find /var/www -type f -exec chmod 644 {} \; \
    && find /var/www -type d -exec chmod 755 {} \; \
    && chgrp -R www-data storage bootstrap/cache \
    && chmod -R ug+rwx storage bootstrap/cache
RUN #chmod +x node_modules/@esbuild/linux-x64/bin/esbuild


# Puppeteer env: skip downloading Chromium (we use system chromium)
ENV PUPPETEER_SKIP_CHROMIUM_DOWNLOAD=true
ENV PUPPETEER_EXECUTABLE_PATH="/usr/bin/chromium"

# Change current user to www
USER $user

# Expose port 9000 and start php-fpm server
EXPOSE 9000

CMD ["php-fpm"]
