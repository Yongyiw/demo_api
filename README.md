# demo_api

## Credits

1) Docker Image for local testing: https://hub.docker.com/r/mattrayner/lamp#introduction
2) Laravel Starter Project via Heroku: https://devcenter.heroku.com/articles/getting-started-with-laravel
3) MySQL provider on Heroku (KiteFin free plan) : https://elements.heroku.com/addons/jawsdb

## Public URLs
https://string-checker-demo-api.herokuapp.com/

## APIs

1) GET message/list  

2) POST message/add 

'text': nullable | max:255 | string

3) DELETE message/delete 

'text': nullable | max:255 | string

4) POST message/edit 

'text': nullable | max:255 | string
'newText': nullable | max:255 | string

5) POST message/check 

'text': nullable | max:255 | string

## Unit Tests

php artisan test

## TO DOs

1) Deploy the project to heroku done
2) Connect to MySQL database locally and remotely done
3) Implement APIs done
4) Design FE page 
5) User authentication

## Dev Notes

1. Setup the git repo for lavarel example project on Heroku: https://devcenter.heroku.com/articles/getting-started-with-laravel

2. Setup the free tier MySQL DB with JawsDB: https://elements.heroku.com/addons/jawsdb


heroku addons:create jawsdb:kitefin -a string-checker-demo-api --version=8.0

3. Run the Lavarel DB migration to test live DB connection and create the tables required

heroku run php artisan migrate

## Local environment
https://hub.docker.com/r/mattrayner/lamp#introduction

docker run  -i -t -p "80:80" -p 3306:3306 -v ${PWD}/demo_api:/app -v ${PWD}/demo_api/mysql:/var/lib/mysql  mattrayner/lamp:latest

## PostMan export
Exported Json file of PostMan requests collections

LightSpeedDemoApi.postman_collection.json


## Post updates

1) Avoid using verb in api endpoint - let http method explain 
2) Patch VS put - partial content update VS replacing whole object
3) Using unique Id instead of text
4) Remove check endpoint and add panlindrome check in add and update
5) Make text unique column
6) Refactor string check into its own service class


