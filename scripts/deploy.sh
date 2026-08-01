#!/bin/bash
# Deployment script for Sidequest Kitchens production

set -e

echo "========================================"
echo "Starting deployment..."
echo "========================================"

cd /var/www/sidequest-kitchens

echo "Pulling latest code..."
git pull origin main

echo "Fetching secrets from AWS Parameter Store..."

if [ -z "$AWS_REGION" ]; then
    AWS_REGION=$(curl -s http://169.254.169.254/latest/meta-data/placement/region 2>/dev/null)
fi

AWS_REGION="${AWS_REGION:-us-east-1}"

echo "Using AWS region: $AWS_REGION"

PARAM_PREFIX="${PARAM_PREFIX:-/sidequest-kitchens/production}"

DB_PASSWORD=$(aws ssm get-parameter --name "$PARAM_PREFIX/db-password" --with-decryption --query 'Parameter.Value' --output text --region "$AWS_REGION")
DB_ROOT_PASSWORD=$(aws ssm get-parameter --name "$PARAM_PREFIX/db-root-password" --with-decryption --query 'Parameter.Value' --output text --region "$AWS_REGION")
APP_KEY=$(aws ssm get-parameter --name "$PARAM_PREFIX/app-key" --with-decryption --query 'Parameter.Value' --output text --region "$AWS_REGION")

cat > .env << EOF
APP_NAME="SideQuest Kitchens"
APP_ENV=production
APP_KEY=${APP_KEY}
APP_DEBUG=false
APP_URL=https://sidequestkitchens.com

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=error

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=sidequest_kitchens
DB_USERNAME=laravel
DB_PASSWORD=${DB_PASSWORD}
DB_ROOT_PASSWORD=${DB_ROOT_PASSWORD}

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="hello@sidequestkitchens.com"
MAIL_FROM_NAME="\${APP_NAME}"
EOF

# Readable by www-data inside the app container (.env is bind-mounted)
chmod 644 .env
echo "Secrets fetched and .env created"

echo "Stopping existing containers..."
docker compose -f docker-compose.prod.yml down

echo "Building and starting containers..."
docker compose -f docker-compose.prod.yml up -d --build

echo "Copying built assets to volume..."
docker compose -f docker-compose.prod.yml exec -u root -T app /usr/local/bin/copy-assets.sh || echo "Warning: Assets copy failed"

echo "Ensuring storage directories exist (empty Docker volume hides image paths)..."
docker compose -f docker-compose.prod.yml exec -u root -T app mkdir -p \
    /var/www/storage/framework/sessions \
    /var/www/storage/framework/views \
    /var/www/storage/framework/cache/data \
    /var/www/storage/logs

echo "Waiting for database..."
sleep 10

echo "Running migrations..."
docker compose -f docker-compose.prod.yml exec -T app php artisan migrate --force

echo "Optimizing Laravel..."
docker compose -f docker-compose.prod.yml exec -T app php artisan config:cache
docker compose -f docker-compose.prod.yml exec -T app php artisan route:cache
docker compose -f docker-compose.prod.yml exec -T app php artisan view:cache

echo "Setting permissions..."
docker compose -f docker-compose.prod.yml exec -u root -T app chown -R www-data:www-data /var/www/storage
docker compose -f docker-compose.prod.yml exec -u root -T app chmod -R 775 /var/www/storage

echo "Running health check..."
sleep 5
if docker compose -f docker-compose.prod.yml exec -T nginx wget -q -O- http://127.0.0.1/ >/dev/null 2>&1; then
    echo "Application is responding"
else
    echo "Warning: Application may not be responding properly"
fi

echo "========================================"
echo "Deployment completed successfully!"
echo "========================================"
