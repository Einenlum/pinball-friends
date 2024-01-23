#!/usr/bin/env bash

/usr/bin/php /var/www/html/artisan optimize:clear --no-ansi -q -n
/usr/bin/php /var/www/html/artisan migrate -n --force
