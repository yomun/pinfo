1) Download
```
$ cd /var/www/html
$ git clone https://github.com/yomun/pinfo
$ cd pinfo
```
2) prepare extensions (vendor)
```
$ composer install
```

3) Change MySql database Settings (.env) 
```
$ cp .env.example .env
$ gedit .env

DB_DATABASE=pinfo
DB_USERNAME=root
DB_PASSWORD=123456
```
4) prepare Key
```
$ php artisan key:generate
```
5) Create database 'pinfo'
```
$ mysql -u root -p123456
mysql> show databases;
mysql> create database pinfo;
mysql> exit
```
6) Database migration
```
$ php artisan migrate
$ php artisan db:seed
```
7) Start 'PInfo' Web Service
```
$ php artisan serve --host=0.0.0.0 --port=8080
```
8) User account for 'PInfo'
```
https://localhost:8080/

Email   : yomun@yahoo.com
Password: 123456
Role    : Administrator
```
