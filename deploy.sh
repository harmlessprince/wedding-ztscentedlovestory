#!/bin/bash
set -e
set -x

APP_CONTAINER="wedding_app_container"

echo "Starting deployment..."

# 1. Pull latest changes from Git
echo "Pulling latest changes from Git..."
git pull origin main  # change branch if needed

# 2. Install PHP dependencies inside the container
echo "Installing PHP dependencies inside container..."
docker exec -it $APP_CONTAINER composer install --no-interaction --optimize-autoloader

# 3. Install Node.js dependencies inside the container
echo "Installing Node.js dependencies inside container..."
docker exec -it $APP_CONTAINER npm install

# 3. Install Node.js dependencies inside the container
echo "Installing Node.js dependencies inside container..."
docker exec -it $APP_CONTAINER npm run build

# 4. Restart Docker Compose containers
echo "Restarting Docker Compose containers..."
docker compose down
docker compose up -d --build

echo "Deployment completed successfully!"
