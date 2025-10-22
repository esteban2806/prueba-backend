⚙️ Funcionalidades del Sistema
🔹 Módulo de Clientes

Obtener todos los clientes: GET /api/clientes

Ver detalle de un cliente: GET /api/clientes/{id}

Registrar nuevo cliente: POST /api/clientes

Actualizar datos de cliente: PUT /api/clientes/{id}

Eliminar cliente: DELETE /api/clientes/{id}

Listar notas asociadas: GET /api/clientes/{id}/notas

🔹 Módulo de Productos

Listar todos los productos: GET /api/productos

Ver producto por ID: GET /api/productos/{id}

Registrar nuevo producto: POST /api/productos

Actualizar producto: PUT /api/productos/{id}

Eliminar producto: DELETE /api/productos/{id}

🔹 Módulo de Notas de Compra

Listar notas: GET /api/notas

Ver nota por ID: GET /api/notas/{id}

Crear nueva nota: POST /api/notas

Actualizar nota: PUT /api/notas/{id}

Eliminar nota: DELETE /api/notas/{id}

Calcular total de nota: GET /api/notas/{id}/total

Listar productos asociados a una nota: GET /api/notas/{id}/productos

🔹 Módulo de Nota-Producto (Tabla Pivote)

Listar registros: GET /api/nota-producto

Ver detalle: GET /api/nota-producto/{id}

Registrar relación: POST /api/nota-producto

Actualizar relación: PUT /api/nota-producto/{id}

Eliminar relación: DELETE /api/nota-producto/{id}

💻 Tecnologías Utilizadas

Laravel 10+ (Framework PHP)

PHP 8.2+

MySQL 8.0 (Base de datos relacional)

Composer (Gestor de dependencias)

Postman (Pruebas de API)

XAMPP / Laragon (Servidor local)

Visual Studio Code (Editor de código)

🧰 Requisitos Previos

Antes de ejecutar el proyecto, asegúrate de tener instalado:

PHP >= 8.2

Composer

MySQL o MariaDB

Git

Postman (opcional, para pruebas)

Editor de texto (VS Code recomendado)

⚙️ Instalación del Proyecto

Clonar el repositorio

git clone https://github.com/tuusuario/prueba-backend.git


Entrar al directorio

cd prueba-backend


Instalar dependencias

composer install


Copiar archivo de entorno

cp .env.example .env


Configurar las credenciales de la base de datos
Edita el archivo .env:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=prueba_backend
DB_USERNAME=root
DB_PASSWORD="tu pasword"


Generar la clave de aplicación

php artisan key:generate


Ejecutar migraciones

php artisan migrate


Iniciar el servidor

php artisan serve