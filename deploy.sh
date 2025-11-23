#!/bin/bash
set -e
set -x

APP_CONTAINER="wedding_app_container"

echo "Starting deployment..."

# 1. Pull latest changes from Git
echo "Pulling latest changes from Git..."
git pull origin main  # change branch if needed

# 2. Rebuild and start Docker containers
echo "Rebuilding and starting Docker Compose containers..."
docker compose down
docker compose up -d --build

# Wait a few seconds for the container to be fully up
sleep 10

# 3. Install PHP dependencies inside the container
echo "Installing PHP dependencies inside container..."
docker exec -i $APP_CONTAINER composer install --no-interaction --optimize-autoloader

# 4. Install Node.js dependencies inside the container
echo "Installing Node.js dependencies inside container..."
docker exec -i $APP_CONTAINER npm install
docker exec -i $APP_CONTAINER npm run build

echo "Deployment completed successfully!"
