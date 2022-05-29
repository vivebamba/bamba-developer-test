# Vive Bamba Cinema

## About project

This application is example of a cinema

## Steps to deploy

1. Clone the project in your server.
2. Copy the **.env.example** with the name **.env** in the project root directory.
3. Create a database in your database management system (Use MySQL or MariaDB)
4. In the **.env** put your database accesses in the corresponding variables `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`.
5. Install the project with the command `composer install` in the project root directory .
6. Run the command `php artisan key:generate` in the project root directory to generate a new key.
7. Change `APP_URL` to yout IP or your custom domain to this application
8. Run the migrations and seeders with the command `php artisan migrate --seed` in the project root directory.
9. See the aplication un your IP or your custom domain to this application

## Steps to unit testing

1. Run the command `php artisan test` in the root directory to test the user module.

***Note: Run tests after deploy***

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
