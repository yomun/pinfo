
1) Download<br>
<br>
$ cd /var/www/html<br>
$ git clone https://github.com/yomun/pinfo<br>
$ cd pinfo<br>
<br>
2) change MySql database Settings (.env) <br>
<br>
$ gedit .env<br>
<br>
DB_DATABASE=pinfo<br>
DB_USERNAME=root<br>
DB_PASSWORD=123456<br>
<br>
3) create database 'pinfo'<br>
<br>
$ mysql -u root -p123456<br>
mysql> show databases;<br>
mysql> create database pinfo;<br>
mysql> exit<br>
<br>
4) database migration<br>
<br>
$ php artisan migrate<br>
$ php artisan db:seed<br>
<br>
5) start 'PInfo' Web Service<br>
<br>
$ php artisan serve --host=0.0.0.0 --port=8080<br>
<br>
6) user acct for try 'PInfo'<br>
<br>
https://localhost:8080/<br>
<br>
Email   : yomun@yahoo.com<br>
Password: 123456<br>
Role    : Administrator
