## Install
* Run `git clone https://github.com/addid10/visual-novel-generator.git` on cmd or terminal
* Run `composer install` on cmd or terminal
* Create a new database on MariaDB
* Change `.env.example` file to `.env` on the root folder
* Open `.env` file and change `DB_DATABASE` to database you have created, `DB_USERNAME` to root, and `DB_PASSWORD` is empty (for XAMPP)
* Run `php artisan key:generate`
* Run `php artisan migrate`
* Run `php artisan db:seed`
* Run `php artisan storage:link`


## DEMO
Demo: https://www.fufcadays.site/visual-novel-generator/
* username: `FUFCA`
* password: `12345`

## RESULT
![Screenshot_2019-11-17 Playing GSA Visual Novel](https://user-images.githubusercontent.com/37059915/69009716-15df0000-0993-11ea-966b-39d9f64e3759.png)


