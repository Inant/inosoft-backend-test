### Requirements

- PHP 8.0

- MongoDB

### Installation
- Run composer install command: `composer install`

- Run composer install command: `php artisan jwt:secret`

- Create .env file from .env.example

- Run command : `php artisan migrate`

- Generate the app key by running the command: `php artisan key:generate`

- To serve the api run the command: `php artisan serve`

- Open postman, and import postman collection from postman folder

- After run login endpoint, edit collection and put your access token to  Authorization with Bearer token

- You can test the available endpoints on postman

- To run the tests use the command: `php artisan test`
