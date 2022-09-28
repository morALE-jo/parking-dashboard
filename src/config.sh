#!/bin/bash

composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed

curl -fsSL https://deb.nodesource.com/setup_current.x | bash -
apt-get install -y nodejs
npm install
npm i vue@next @vitejs/plugin-vue@3.0.0
npm i vue-router@4
npm run build

a2enmod rewrite
service apache2 restart