#!/bin/bash
set -e
set -x

APP_CONTAINER="wedding_app_container"

echo "Starting deployment..."

# 1. Pull latest changes from Git
git pull origin main

# 2. Rebuild and start Docker containers
docker compose down
docker compose up -d --build

# Wait a few seconds for container to be fully up
sleep 5

# 3. Fix Git safe directory and ownership
docker exec -i $APP_CONTAINER bash -c "
    git config --global --add safe.directory /var/www
    chown -R www:www /var/www
"

# 4. Install PHP dependencies
docker exec -i $APP_CONTAINER bash -c "cd /var/www && composer install --no-interaction --optimize-autoloader"

# 5. Install Node.js dependencies
docker exec -i $APP_CONTAINER bash -c "cd /var/www && npm install"
docker exec -i $APP_CONTAINER bash -c "cd /var/www && npm run build"

echo "Deployment completed successfully!"
