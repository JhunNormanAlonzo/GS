<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Steps to install

Please make sure to follow the instruction in order to complete installation.

Requirements to download and install. jus t click the word in order to redirect in download page.

-   [GIT](https://git-scm.com/download/win)
-   [Nodejs](https://nodejs.org/en/download/current)
-   [Composer](https://getcomposer.org/Composer-Setup.exe)
-   [Laragon](https://laragon.org/download/index.html).

Please take note that if you dont have install these installer on your machine , it wont work .

## Installation

Download the repository

Place the GS folder to your laragon . [C/laragon/www/GS] then press enter .

create .env file
and copy the content .env.example to .env file

this should be the configuration of database

-   **DB_CONNECTION=mysql**
-   **DB_CONNECTION=mysql**
-   **DB_HOST=127.0.0.1**
-   **DB_PORT=3306**
-   **DB_DATABASE=bnatsgs**
-   **DB_USERNAME=root**
-   **DB_PASSWORD=**

Go to the path using this command (cd c/laragon/www/GS) then run this command

-   **php artisan key:generate**
-   **php artisan migrate**
-   **php artisan migrate:fresh --seed**
-   **composer install**
-   **npm install**
-   **npm run build**
-   **php artisan serve**

## You can now see the link to click then it will open the system. Goodluck!
