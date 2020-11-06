<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Introduccion

Este proyecto nacio a peticion de un Trabajo Final Integrador de la catedra Administracion de Recursos.
El cual exigia la resolucion de un modulo de Empleados donde debiamos considerar un CRUD de los mismos, roles-permiso, asignacion de supervisores y reportes para la toma de decisiones.


## Herramientas

 - instale Composer
 - Mysql
 - Laravel framework V 7.*

## Ejecucion

 - clone este repositorio con: git clone https://github.com/DiegoMedina2019/TFI_GestionDePersonal
 - una vez en su directorio ejecute el comando: composer update
 - luego configure el archivo .env tomando como ejemplo el archivo .env.example
 - ejecute php artisan migrate --seed para generar la DB y las tablas necesarias (tendra un usuario Administrador por defecto) los datos del administrador podra verlo en el directorio /database/seeds/UserSeeder.php
 - por ultimo ejecute el comando php artisan serve para ejecutar el sistema en su PC

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.