#!/bin/sh

# update database
php artisan migrate:refresh --seed
