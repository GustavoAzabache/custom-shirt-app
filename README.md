# Custom Shirt App

**Custom Shirt App** es una aplicación web desarrollada con Laravel que permite a los usuarios subir diseños personalizados para camisetas, gestionarlos y compartirlos. También funciona como un catálogo visual donde otros usuarios pueden explorar diseños públicos.

## 🚀 Funcionalidades

- Registro e inicio de sesión con Laravel Breeze.
- Subida de diseños personalizados (con imagen y nombre).
- Opción de hacer el diseño público o privado.
- Edición y eliminación de diseños propios.
- Visualización de todos los diseños públicos.
- Interfaz responsiva y sencilla con Tailwind CSS.

## 🛠️ Tecnologías utilizadas

- PHP 8.3.6
- Laravel 12
- Laravel Breeze (autenticación sencilla con Blade)
- MySQL

## ⚙️ Instalación

1. Clona el repositorio:
```bash
git clone https://github.com/tu-usuario/custom-shirt-app.git
cd custom-shirt-app
```

2. Instala las dependencias:
```bash
composer install
npm install && npm run dev
```

3. Copia el archivo `.env` y configura la base de datos:
```bash
cp .env.example .env
php artisan key:generate
```

4. Configura tu base de datos en `.env` y luego ejecuta las migraciones:
```bash
php artisan migrate
```

5. Inicia el servidor:
```bash
php artisan serve
```

## 📁 Estructura destacada

- `app/Models/Desing.php`: Modelo de los diseños.
- `app/Http/Controllers/DesingController.php`: Lógica de subida, edición y eliminación.
- `resources/views/`: Vistas en Blade (formulario, dashboard, catálogo, etc.).
- `routes/web.php`: Rutas principales de la aplicación.

## 🧪 Validaciones y Seguridad

- Validación de formularios (`Request::validate`).
- Acceso protegido con middleware `auth`.
- Solo el dueño puede editar o eliminar su diseño.

## 🤝 Créditos

Este proyecto fue desarrollado como parte de un curso académico para reforzar conocimientos de Laravel, MVC, Blade y buenas prácticas de desarrollo backend.

> ⚠️ Nota: Este proyecto originalmente tenía un nombre distinto para uso interno en un curso universitario. Para su publicación en GitHub, se renombró como "Custom Shirt App".