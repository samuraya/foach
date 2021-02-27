# Introduction
Vue-Laravel fullstack app for test assignment at Foach Company. Follows Materials Design styling with Vuetify (https://vuetifyjs.com/en/)

## Live Demo 
deployed on heroku: https://foach.herokuapp.com

## Installation
1. git clone this repository
2. In project root run "composer install" and "npm install"
3. in ".env" file provide environmental variables according to your set up. usse ".env.sample" as sample file
4. run "php artisan key:generate" to generate APP_KEY
5. run "php artisan migrate" to set up database tables.
5. run "php artisan db:seed" to set up dummy database for employees table.

## Endpoints
1. GET to "/" will return SignUp page
2. POST to "/register"  will store user created account details.
3. GET to "/employees"  will return List of current employees with their name, title and vacation status.
4. POST to "/vacation" will update employee vacation status (on/off).

## Laravel Macro (View::component)
This macro allows controllers to return a single vue component together with json data. There is no need to use blade templates for each layout. 
Controllers provide component name and data which is sent back to client. The rendering happens at client side. 
View Macro is initiated in App\\Providers\\AppServiceProvider -> inside function boot(). More details in https://reinink.ca/articles/server-side-apps-with-client-side-rendering

## Validations
validations are done both at frontend and also backend. The server side is able to return errors caused by improper user inputs.








