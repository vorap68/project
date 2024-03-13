#!/bin/bash
composer create-project laravel/laravel:^8.0 example
cp -r example/{*,.*} .
rm -rf example
composer update
composer require laravel/ui
php artisan ui:auth
php artisan ui bootstrap
npm install && npm run dev
npm run dev
chmod -R 777 storage/	
