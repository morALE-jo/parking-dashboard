# parking-dashboard

This project is made as a coding challenge for a posible new position application

Instructions to run
1 - Clone the repository
2 - Make sure to have Docker running on your machine
3 - Go to project folder and run "docker-compose up -d --build" and wait for everything to be installed
4 - Run "docker-compose exec php-apache /bin/bash"
5 - Run "composer install" to get all Laravel Dependancies
6 - Copy /src/.env.example to .env file and fill up database credentials (username and password)
7 - Run "php artisan migrate --seed" to generate database and fill with dummy data

Aditional instructions for the vue-interface branch
Node should be installed directly in the docker container, doing it here temporarily
8 - curl -fsSL https://deb.nodesource.com/setup_current.x | bash -
9 - apt-get install -y nodejs
10 - npm install
12 - npm i vue@next @vitejs/plugin-vue@3.0.0
13 - npm run build

To enable Laravel routing run the following commands
* docker-compose exec php-apache /bin/bash (or continue without exiting from step 4)
* a2enmod rewrite
* service apache2 restart
* after this the server will stop and will need a manual start on docker desktop or cli
* open the browser in http://localhost:8080/ and it should be good to go

