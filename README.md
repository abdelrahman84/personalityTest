# personalityTest

# Insallation:

1- clone the application

2- For the backend:

a- go the directory: 'personalityAPI'

b- run: docker-compose build app

c- run: docker-compose up -d

d- run: docker-compose exec app composer install

e- make sure to create a local db ('personality'), and add your convient password, and update the .env file accordingly. 

f- run: docker-compose exec app php artisan key:generate

g- run: docker-compose exec app php artisan migrate

h- run:  docker-compose exec app php artisan db:seed

3- For the frontend:

a- go the to directory: personality_ui

b- run the command: docker build -t personality_ui .

c- then run the image: docker run -p 80:80 personality_ui

4- To run unit test:

Inside the bakcend continer (run './vendor/bin/phpunit --filter PersonalityTest')

I have added a short video to display the application:

https://drive.google.com/file/d/1QzLTACrAcLMtfLPnzKgzsHbjtRa0DNQy/view?usp=sharing
