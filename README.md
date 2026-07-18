# TechStore Explorer

Aplicación desarrollada con Laravel que permite explorar productos, gestionar una wishlist, autenticación de usuarios, envío de correos mediante Mailtrap, dashboard administrativo y una API REST protegida con Laravel Sanctum.

---

# Requisitos

* PHP 8.5+
* Composer
* Node.js 20+
* pnpm (recomendado) o npm
* MySQL
* Git

---

# Instalación

## 1. Clonar el repositorio

```bash
git clone git@gitlab.com:usuario/TechStore-Explorer.git
cd TechStore-Explorer
```

## 2. Instalar dependencias

### Backend

```bash
composer install
```

### Frontend

El proyecto fue desarrollado utilizando **pnpm**, aunque también es compatible con **npm**.

Con **pnpm** (recomendado):

```bash
pnpm install
```

o con **npm**:

```bash
npm install
```

## 3. Configurar variables de entorno

Crear el archivo `.env`

```bash
cp .env.example .env
```

Generar la llave de la aplicación

```bash
php artisan key:generate
```

## 4. Configurar la base de datos

Actualizar las variables correspondientes en `.env`

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=techexplorer
DB_USERNAME=root
DB_PASSWORD=password
```

## 5. Ejecutar migraciones y seeders

```bash
php artisan migrate --seed
```

## 6. Compilar assets

Con **pnpm** (recomendado):

```bash
pnpm dev
```

Para producción:

```bash
pnpm build
```

También es posible utilizar **npm**:

```bash
npm run dev
```

o

```bash
npm run build
```

## 7. Levantar el servidor

```bash
php artisan serve
```

La aplicación estará disponible en:

```
http://127.0.0.1:8000
```

---

# Variables de entorno de ejemplo

```env
APP_NAME=TechStore
APP_ENV=local
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=techexplorer
DB_USERNAME=root
DB_PASSWORD=password

MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=no-reply@example.com
MAIL_FROM_NAME="${APP_NAME}"
```

---

## Pruebas de correo con Mailtrap

Para el desarrollo del proyecto se utilizó **Mailtrap** con un **Sandbox SMTP**, lo que permite interceptar todos los correos enviados por la aplicación sin entregarlos a direcciones reales.

Una vez configuradas las credenciales SMTP en el archivo `.env`, los correos enviados al agregar o eliminar productos de la wishlist pueden visualizarse directamente desde la bandeja de entrada (Inbox) del Sandbox de Mailtrap.

### Bandeja de entrada

![Bandeja de Mailtrap](docs/Mailtrap.png)
---



# API REST

La API utiliza autenticación mediante **Laravel Sanctum**.

## Autenticación

### Registrar usuario

```
POST /api/register
```

### Iniciar sesión

```
POST /api/login
```

Devuelve un **Bearer Token** que debe enviarse en los endpoints protegidos.

---

## Wishlist

**Requiere autenticación.**

### Obtener wishlist

```
GET /api/wishlist
```

### Agregar producto

```
POST /api/wishlist
```

Body:

```json
{
    "product_id": 1
}
```

### Eliminar producto

```
DELETE /api/wishlist
```

Body:

```json
{
    "product_id": 1
}
```

---

## Roles

**Requiere:**

* Bearer Token
* Usuario con rol **admin**

### Obtener roles

```
GET /api/roles
```

### Crear rol

```
POST /api/roles
```

### Obtener un rol

```
GET /api/roles/{id}
```

### Actualizar rol

```
PUT /api/roles/{id}
```

### Eliminar rol

```
DELETE /api/roles/{id}
```

---

# Credenciales de prueba

## Administrador

```
Email:
admin@example.com

Password:
admin123
```

## Cliente

```
Email:
test@example.com

Password:
customer123
```

---

# Autenticación de la API

Después de iniciar sesión, el token debe enviarse en cada petición protegida mediante el encabezado:

```
Authorization: Bearer TU_TOKEN
```

---

# Tecnologías utilizadas

* Laravel 13
* Livewire
* Vue 3
* Tailwind CSS
* Laravel Sanctum
* Mailtrap
* MySQL
* Chart.js
* Vue Chart.js

---

# Uso de IA

Durante el desarrollo utilicé herramientas de IA como apoyo para resolver dudas técnicas, acelerar tareas repetitivas y comprender tecnologías con las que tenía poca experiencia previa. Todas las sugerencias fueron revisadas y adaptadas antes de incorporarlas al proyecto.

En particular, la IA me ayudó en:

* Resolver un problema de configuración de Git al migrar el repositorio de HTTPS a SSH, ya que inicialmente no podía subir cambios a GitLab.
* Revisar la ortografía y redacción de los mensajes de commit siguiendo buenas prácticas.
* Analizar errores de Laravel, PHP y otras herramientas para comprender el origen del problema y obtener posibles soluciones antes de implementarlas manualmente.
* Comprender el flujo de trabajo de Livewire, tecnología con la que no tenía experiencia previa, especialmente para decidir cuándo reutilizar componentes y cuándo desarrollar una solución desde cero.
* Utilizar sugerencias y autocompletados durante el desarrollo. No todas las sugerencias fueron aceptadas, ya que en ocasiones proponían importaciones o implementaciones incorrectas que fueron descartadas tras revisarlas.

La lógica de negocio, la arquitectura del proyecto, la implementación de la API REST con Laravel Sanctum, el sistema de roles, la wishlist, el dashboard, la autenticación, la integración con Mailtrap y las decisiones de diseño fueron desarrolladas y adaptadas manualmente.

Aunque hubo un problema que no pude solucionar y era que al parecer mi equipo bloqueava las imagenes de la api, se implemento una solucion donde si falla al traer la imagen se utiliza otra, aunque aclaro que en produccion no sucede este problema.