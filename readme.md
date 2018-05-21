1) Download
```
$ cd /var/www/html
$ git clone https://github.com/yomun/pinfo
$ cd pinfo
```
2) Change MySql database Settings (.env) 
```
$ gedit .env

DB_DATABASE=pinfo
DB_USERNAME=root
DB_PASSWORD=123456
```
3) Create database 'pinfo'
```
$ mysql -u root -p123456
mysql> show databases;
mysql> create database pinfo;
mysql> exit
```
4) Database migration
```
$ php artisan migrate
$ php artisan db:seed
```
5) Start 'PInfo' Web Service
```
$ php artisan serve --host=0.0.0.0 --port=8080
```
6) User account for 'PInfo'
```
https://localhost:8080/

Email   : yomun@yahoo.com
Password: 123456
Role    : Administrator
```
