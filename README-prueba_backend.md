# Proyecto Backend - Laravel

Este proyecto es una prueba técnica en **Laravel** con las siguientes entidades:
- Clientes
- Productos
- Notas de Compra
- Nota_Producto (pivot)

Incluye **CRUD completo** y **2 funcionalidades extra**:
1. Consultar todas las notas de un cliente con sus productos.
2. Calcular el total de una nota de compra.

## 🚀 Requisitos
- PHP >= 8.1
- Composer
- MySQL
- Laravel 10
- Postman (para pruebas de endpoints)

## ⚙️ Instalación

```bash
# Clonar repositorio
git clone https://github.com/TU-USUARIO/prueba-backend.git
cd prueba-backend

# Instalar dependencias
composer install

# Copiar archivo de entorno
cp .env.example .env

# Generar key
php artisan key:generate

# Configurar base de datos en .env
DB_DATABASE=prueba_backend
DB_USERNAME=root
DB_PASSWORD=tu_clave

# Migraciones
php artisan migrate --seed

# Levantar servidor
php artisan serve
```

## 📌 Endpoints

La colección de Postman está en la carpeta `/postman`.

Clientes
GET /api/clientes
POST /api/clientes
GET /api/notas/{id}/total
GET /api/clientes/{id}/notas

-Productos
GET /api/productos → Listar productos
POST /api/productos → Crear producto
GET /api/productos/{id} → Ver producto
PUT /api/productos/{id} → Actualizar producto
DELETE /api/productos/{id} → Eliminar producto

-Notas de Compra
GET /api/notas → Listar notas
POST /api/notas → Crear nota
GET /api/notas/{id} → Ver nota
PUT /api/notas/{id} → Actualizar nota
DELETE /api/notas/{id} → Eliminar nota
GET /api/notas/{id}/productos → Ver productos de una nota
GET /api/notas/{id}/total → Calcular el total de una nota de compra

-Nota-Producto
GET /api/nota-producto → Listar relaciones
POST /api/nota-producto → Crear relación
GET /api/nota-producto/{id} → Ver relación
PUT /api/nota-producto/{id} → Actualizar relación
DELETE /api/nota-producto/{id} → Eliminar relación


### 🔹 Cómo importar la base de datos

1. Abre una terminal en la carpeta del proyecto.
2. Ingresa a MySQL con tu usuario y contraseña:
   ```bash
   mysql -u root -p
SOURCE database.sql;

SHOW DATABASES;
USE prueba_backend;
SHOW TABLES;

