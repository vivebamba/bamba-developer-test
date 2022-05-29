# Vive Bamba Cinema

## About project

This application is example of a cinema

### Environment

1. PHP >= 7.3

## Steps to deploy

1. Clone the project in your server.
2. Copy the **.env.example** with the name **.env** in the project root directory.
3. Create a database in your database management system (Use MySQL or MariaDB)
4. In the **.env** put your database accesses in the corresponding variables `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`.
5. Install the project with the command `composer install` in the project root directory.
6. Run the command `php artisan key:generate` in the project root directory to generate a new key.
7. Change `APP_URL` to yout IP or your custom domain to this application.
8. Run the migrations and seeders with the command `php artisan migrate --seed` in the project root directory.
9. See the aplication un your IP or your custom domain to this application.

## Steps to unit testing

1. Run the command `php artisan test` in the root directory to test the user module.

***Note: Run tests after deploy***

## Steps to deploy on Docker

2. Copy the **.env.example** with the name **.env** in the project root directory.
3. Create a database in your database management system (Use MySQL or MariaDB)
4. In the **.env** put your database accesses in the corresponding variables `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`.
5. Install the project with the command `composer install` in the project root directory.
6. Run the command `php artisan key:generate` in the project root directory to generate a new key.
7. Install Docker if you dont have it.
8. Run your Docker
9. In the project root directory use `./vendor/bin/sail up`
10. In the project root directory use `./vendor/bin/sail artisan migrate --seed`
11. If you have down application use `./vendor/bin/sail stop`

***Note: Maybe you could have a error like this ERROR: Service `laravel.test' failed to build` when you run `sail up` 
you can see this post [solution](https://stackoverflow.com/questions/70232785/laravel-sails-service-laravel-test-failed-to-build), 
if you have error with your ports you can use `FORWARD_DB_PORT=3307 APP_PORT=81` before to  `./vendor/bin/sail up` to change ports***

## Steps to unit testing on Docker

1. Run the command `./vendor/bin/sail artisan test` in the root directory to test the user module.

***Note: Run tests after deploy***

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
