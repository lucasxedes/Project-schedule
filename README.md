<h1>Getting started</h1>

<h2>Installation Please check the official laravel installation guide for server requirements before you start. Official Documentation Alternative installation is possible without local dependencies relying on Docker.</h2>

Clone the repository: <b>git clone git@github.com:lucasxedes/Project-schedule.git</b>

Switch to the repo folder: <b>cd project-schedule</b>

Install all the dependencies using composer: <b>composer install</b>

Run the database migrations (Set the database connection in .env before migrating):<b> php artisan migrate</b>

Start the local development server: php artisan serve

Testing API:

Run the laravel development server

The api can now be accessed at:<b> http://localhost:8000/api</b>

Request headers:

Required Key Value Yes <b>Content-Type application/json</b> Yes <b>Accept application/json</b>
