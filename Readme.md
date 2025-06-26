# 📦 API REST de Pedidos (PHP + MySQL)

Este proyecto es una API RESTful básica desarrollada en **PHP** con **MySQL**, utilizando **XAMPP** como entorno de pruebas local. Fue creado con fines **educativos** como parte de una actividad académica del curso **Computación Paralela y Distribuida**.

## 🚀 Funcionalidades

La API permite gestionar pedidos mediante operaciones CRUD:

| Método | Endpoint                    | Descripción                         |
|--------|-----------------------------|-------------------------------------|
| GET    | `/api/pedidos`              | Obtener todos los pedidos           |
| GET    | `/api/pedidos/{id}`         | Obtener un pedido por ID            |
| POST   | `/api/pedidos`              | Crear un nuevo pedido               |
| PUT    | `/api/pedidos/{id}`         | Actualizar el estado de un pedido   |
| DELETE | `/api/pedidos/{id}`         | Eliminar un pedido                  |

Además, cuenta con **protección mediante API Key** para evitar accesos no autorizados.

---

## 🔐 Autenticación

Para consumir la API es obligatorio enviar una cabecera HTTP:

Clave: X-API-Key: 123456ABCDEF

> Puedes modificar la clave en el archivo `config/auth.php`.

---

## ⚙️ Estructura del Proyecto

   >
   /Caso1_CPD_HugoLainez/
   ├── config/
   │ ├── conexion.php # Conexión a la base de datos
   │ └── auth.php # API Key
   ├── controllers/
   │ └── pedidoController.php # Controlador principal
   ├── models/
   │ └── Pedido.php # Clase de modelo Pedido
   ├── index.php # Punto de entrada (router)

La carpeta tests contiene varios scripts utilizados para probar la conexion a la base de datos mediante el modelo.

---

## 🧠 Requisitos

- XAMPP para PHP y MySQL
- Postman para pruebas

---

## 🛠 Instalación rápida

1. Clona el repositorio:
   ```bash
   git clone https://github.com/usuario/repositorio

2. Importa el archivo SQL en tu base de datos (tabla pedidos).
   pedidos.sql contiene todo el codigo para crear la tabla pedidos.
   
3. Configura la conexión en config/conexion.php.
   En caso de cambiar el nombre de la base de datos debes modificar el cambio en conexion.php para que pueda conectar.

4. Abre el proyecto en tu navegador local:
   ```bash
   http://localhost/Caso1_CPD_HugoLainez/index.php/api/pedidos