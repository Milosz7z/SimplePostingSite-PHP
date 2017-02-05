##Register and login system

-----------------

This is a structural version of register & login system, which is one of the commonest used on plenty of websites all over the world.
It provides basics operations like: register, log in and log out.
However, it is advisable to use object oriented version, which you can explore https://github.com/mixset/register-and-login-system-oop. 

How to install?
-----------------
Installing script is very short and easy.
All you need to do is to edit `config.php` file and create database.
When it comes to `config.php` file, in suitable fields, you have to fill up your data to connect to database.
You also need to create appropriate table in your PMA. The code, that creates it is included in `user.sql`.

Changelog
--------
[08.12.2015]
- HTML, CSS and PHP code refactoring
- added some conditionals, which eg. checks whether `config.php` file exists. 
- simple variables were changes into array in config file.
- unnecessary comments were removed
- few less important changes in code 