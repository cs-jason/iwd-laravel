Setup instructions

1. Download composer (https://getcomposer.org/download/)

    Enter into terminal:
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    php -r "if (hash_file('sha384', 'composer-setup.php') === 'e21205b207c3ff031906575712edab6f13eb0b361f2085f1f1237b7126d785e826a450292b6cfd1d64d92e6563bbde02') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
    php composer-setup.php
    php -r "unlink('composer-setup.php');"

2. Rename .env.example to .env

3. Look for DB_DATABASE=laravel, change it to DB_DATABASE=iwdlaravel

4. Run $ composer install

5. Run $ php artisan key:generate

6. Run $ php artisan migrate

7. Run $ php artisan db:seed

8. Run $ php artisan serve
