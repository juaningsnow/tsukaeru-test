This test is created in Laravel 9.

Command to Update Currency Data
 -php artisan currency:update

when migrating database, please add --seed option on the command. I have seeded a single user for token authentication functionality
 - php artisan migrate --seed

Routes:

POST - /tokens \
  (returns fresh Bearer Token) \
GET - /currencies \
  (returns list of currency codes and names) \
GET - /currencies/{code} \
  (returns currency code data, latest based on last currency:update command) \



Usage:

`Run php artisan currency:update to populate database with Currency data

`Assuming you have ran php artisan migrate --seed, you can now make a post request on /tokens to acquire a token, you can now add the returned token as Authorization Header on your requests on other routes.

     -   Authorization => Bearer {acquired token from post request}