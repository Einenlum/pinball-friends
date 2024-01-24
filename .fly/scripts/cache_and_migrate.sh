#!/usr/bin/env bash

/usr/bin/php /var/www/html/artisan optimize:clear --no-ansi -q -n

if [ "$APP_ENV" == "demo" ]
then
    /usr/bin/php /var/www/html/artisan migrate:fresh -n --force
    /usr/bin/php /var/www/html/artisan db:seed --class="Database\Seeders\DemoSeeder" -n --force
else
    /usr/bin/php /var/www/html/artisan migrate -n --force
fi
