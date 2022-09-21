# parking-dashboard

This project is made as a coding challenge for a posible new position application

Instructions to run
1 - Clone the repository
2 - Make sure to have Docker running on your machine
3 - Go to project folder and run "docker-compose up -d --build" and wait for everything to be installed
4 - Run "docker-compose exec php-apache /bin/bash"
5 - Run "composer install" to get all Laravel Dependancies
6 - Copy /src/.env.example to .env file and fill up database credentials (username and password)
7 - Run "php artisan migrate"
