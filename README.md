Cutsol
========================

Requisitos
------------

  * PHP 7.2 or superior.
  * [requisitos habituales de una aplicación Symfony][1].
  
Configuración Base datos
------------
1. copiar el archivo `.env.dist` y guardarlo
  como `.env`, utilizando las credenciales con las cuales se configuró MySQL.

 

Instalación
------------

```bash
$  cd cutsol/
$  composer require friendsofsymfony/user-bundle "~2.0"
$  composer install
$  php bin/console doctrine:database:create
$  php bin/console doctrine:migrations:migrate
$  composer require orm-fixtures --dev
$  php bin/console make:fixtures
```

Levantar App
-----

Ejecute el comando y abra la siguiente URL en su navegador <http://localhost:8000>:

```bash
$ php bin/console doctrine:fixtures:load
$ php bin/console server:run
```




[1]: https://symfony.com/doc/current/reference/requirements.html

