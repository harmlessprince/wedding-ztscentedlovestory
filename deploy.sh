#!/bin/bash

# Exit immediately if a command exits with a non-zero status
set -e

# Optional: print each command before executing
set -x

echo "Starting deployment..."

# 1. Pull latest changes from Git
echo "Pulling latest changes from Git..."
git pull origin main  # change 'main' to your branch if needed

# 2. Install PHP dependencies
echo "Installing PHP dependencies..."
composer install --no-interaction --optimize-autoloader

# 3. Install Node.js dependencies
echo "Installing Node.js dependencies..."
npm install

# 4. Restart Docker containers
echo "Restarting Docker containers..."
sudo docker compose down
sudo docker compose up -d --build

echo "Deployment completed successfully!"
