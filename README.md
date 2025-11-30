# MundiMotos: Sistema de Gestión de Inventario

## 1. Introducción

Este proyecto es un sistema básico de gestión de inventario para productos de motocicletas y repuestos, denominado **MundiMotos**. Está diseñado para realizar operaciones CRUD (Crear, Leer, Actualizar, Eliminar) en dos módulos principales: Tipos de Producto (Categorías) y Productos.

La característica distintiva del sistema es la lógica avanzada de gestión de stock mediante la función **Upsert**.

## 2. Requisitos Técnicos

Para ejecutar este proyecto localmente, necesitarás el siguiente stack tecnológico:

* **Servidor Web:** Apache o Nginx.
* **Lenguaje:** PHP v7.4 o superior (con la extensión PDO para MySQL).
* **Base de Datos:** MySQL o MariaDB.
* **Frontend:** HTML5, CSS (Bootstrap 5), JavaScript.

## 3. Instalación y Configuración

Sigue estos pasos para poner en marcha la aplicación:

1.  **Clonar el Repositorio:** Descarga todos los archivos del proyecto a tu directorio de servidor web (e.g., `htdocs` o `www`).
2.  **Configurar Base de Datos:**
    * Crea una base de datos MySQL (por ejemplo, llamada `mundimotos`).
    * Importa el archivo de esquema y datos de prueba: `mundimotos_productos.sql`.
3.  **Configurar Conexión:** Edita el archivo `conexion.php` y actualiza las credenciales de la base de datos (nombre de usuario, contraseña, nombre de la base de datos) según tu configuración local.

## 4. Estructura de Archivos Clave

El proyecto está organizado en archivos modulares para separar la lógica de negocio y la presentación:

| Archivo | Ubicación | Descripción |
| :--- | :--- | :--- |
| `conexion.php` | Raíz | Clase PHP encargada de establecer y gestionar la conexión PDO a la base de datos MySQL. |
| `dashboard.php` | Raíz | Punto de entrada de la aplicación. Contiene la estructura HTML principal, el menú de navegación (pestañas) y carga los módulos CRUD. |
| `includes/crud_tipos.php` | `includes/` | Módulo PHP para gestionar los Tipos de Producto (Categorías). |
| `includes/crud_productos.php` | `includes/` | **Módulo Central.** Contiene toda la lógica de gestión de Productos, incluyendo la implementación del mecanismo **Upsert de Stock**. |
| `mundimotos_productos.sql` | Raíz | Archivo SQL con el esquema de la base de datos (tablas `productos` y `tiposdeproducto`) y datos iniciales. |

## 5. Característica Principal: Lógica Upsert de Stock

La función más importante del proyecto es el manejo inteligente de las entradas de stock, implementada en `includes/crud_productos.php`.

En lugar de simplemente insertar o actualizar un producto, el sistema realiza una operación **Upsert** (Update or Insert) basado en la unicidad del producto:

1.  Cuando se intenta ingresar un producto con el mismo **Nombre, Marca y Modelo**, el sistema lo detecta como un producto existente.
2.  En lugar de crear un duplicado, el código ejecuta una operación de **UPDATE**, sumando la nueva cantidad de stock a la cantidad ya existente en el inventario.
3.  Si la combinación es nueva, el código realiza una operación de **INSERT** como un producto nuevo.

Esta lógica asegura la integridad del inventario y evita entradas de stock duplicadas para el mismo artículo.
