# EmpleadosJVN
registro de empleados Laravel + VueJS

## REQUISITOS:
Vue: 3<br>
Laravel Framework 10.4.1

## Al clonar un proyecto desde GitHub:
##Para el Backend (Laravel)

### Ubicacion de la API
Se podra copiar solo la ruta del Backend o el proyecto completo en un servidor apache.

### Instalar dependencias:
Para ello abrir una terminal en la carpeta del proyecto Backend y ejecutar: composer install
Se crea la carpeta vendor

### Crear una base de datos que soporte Laravel
Entre las bases de datos que soporta Laravel por defecto, encontramos: MySQL, SQL Lite, PostgreSQL y SQL Server.

### Crear el archivo .env
Este archivo es necesario para, configurar la conexión de la DB, el entorno del proyecto, motores para envio y recepción de correos etc …
Duplicar el archivo .env.example, renombrarlo a .env e incluir los datos de conexión de la base de datos
Ejemplo:

..... -DB_CONNECTION=mysql
-DB_HOST=localhost
-DB_PORT=3306
-DB_DATABASE=base de datos creada
-DB_USERNAME=root
-DB_PASSWORD=secret .....

### Ejecutar migraciones
Ejecutar las migraciones para que se generen las tablas con:
php artisan migrate


## Para el FrontEnd (VUE)
### Ejecutar npm install
el comando descargara todas las dependencias necesarias para poder ejecutar nuestro proyecto VUE en el servidor local. 

### Verificar la ruta del Backend
En los componentes componentList y ComponentCreate se realiza la peticion para consumo de la API que se encuentra en el servidor, 
la cual tendra la siguiente estructura http://localhost/Emp_JVN/Backend/public/api/employee/. esta url se debe modificar es su parte inicial
http://localhost/Emp_JVN, segun el servidor donde se aloje la API.

### Levantar Servidor VUE
Finalmente usamos el comando npm run serve para levantar nuestro servidor
npm run serve








