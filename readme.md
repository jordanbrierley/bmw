
Details of how to install and compile assets below, based on laravel 5.4

If you clone this into your directory and run `composer update` to install all the necessary packages for the application

### Quick install instructions
1. Clone repository into your directory
2. Run `composer update` to install composer dependancies
3. Run `npm install` to install node dependancies followed by `npm run dev` to compile assets in dev mode
4. Set up env file to connect to database
5. Run `php artisan migrate` to create the database and the necessary tables
6. Finally run `php artisan bmw:import` to import the data from the api into the database

