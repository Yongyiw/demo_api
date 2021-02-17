# demo_api

## APIs

1) GET message/list
2) POST message/add
3) POST message/delete
4) POST message/edit
5) POST message/check

## TO DOs

1) Deploy the project to heroku
2) Connect to MySQL database locally and remotely
3) Implement APIs
4) Design FE page
5) User authentication

## Instructions

1. Setup the git repo for lavarel example project on Heroku: https://devcenter.heroku.com/articles/getting-started-with-laravel

2. Setup the free tier MySQL DB with JawsDB: https://elements.heroku.com/addons/jawsdb


heroku addons:create jawsdb:kitefin -a string-checker-demo-api --version=8.0

3. Run the Lavarel DB migration to test live DB connection and create the tables required

heroku run php artisan migrate

## Local environment
https://hub.docker.com/r/mattrayner/lamp#introduction

docker run  -i -t -p "80:80" -p 3306:3306 -v ${PWD}/demo_api:/app -v ${PWD}/demo_api/mysql:/var/lib/mysql  mattrayner/lamp:latest


