laradmin
=====

`Laradmin` is a laravel package for can be generated fast backend management panel.


Requires
------------

- PHP 7+ 
- Laravel 5.5

Installation
------------

First, install laravel 5.5, and make sure that the database connection settings are correct.

```
composer require angkee/laradmin
```

Then run these commands to publish assets and config：

```
php artisan vendor:publish --provider="Angkee\Admin\AdminServiceProvider"
```
After run command you can find config file in `config/admin.php`, in this file you can change the install directory,db connection or table names.

At last run following command to finish install. 
```
php artisan admin:install
```

Open http://localhost/admin/ in browser.

login account

- email: `admin@test.com`
- password: `admin`


Default Settings
------------
The file in `config/admin.php` contains an array of settings, you can find the default settings in there.

License
------------
`laravel-admin` is licensed under [The MIT License (MIT)](LICENSE).
