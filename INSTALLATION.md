# WaliTake — Guía de Instalación y Configuración

Guía directa para montar el proyecto local. Seguirla en orden.

---

## 1. Requisitos previos

| Herramienta | Versión mínima | Verificar |
|---|---|---|
| PHP | 8.2+ | `php -v` |
| Composer | 2.x | `composer -V` |
| Node.js | 18+ (recomendado 20+) | `node -v` |
| npm | 9+ | `npm -v` |
| Git | 2.x | `git --version` |

> **Laravel Herd**: Descargar PHP 8.2 o 8.3 en Herd → Settings → PHP y marcarlo como Global. Confirmar con `php -v`.
>
> **XAMPP (Windows)**: Activar `pdo_pgsql` e `intl` en `C:\xampp\php\php.ini` (descomentar las líneas `extension=pdo_pgsql` y `extension=intl`).

### Extensiones PHP requeridas

```
pdo_pgsql, intl, mbstring, openssl, curl, fileinfo, tokenizer, xml, ctype, json, bcmath
```

Verificar:

```bash
php -m | grep -iE "pdo_pgsql|intl|mbstring|openssl|curl|fileinfo|tokenizer|xml|ctype|json|bcmath"
```

---

## 2. Clonar el repositorio

```bash
git clone <URL_DEL_REPO> walitake
cd walitake
```

---

## 3. Instalar dependencias

### PHP

```bash
composer install
```

Crea `vendor/` con las versiones exactas de `composer.lock`.

### JavaScript

```bash
npm install
```

Crea `node_modules/` a partir de `package-lock.json`.

---

## 4. Configurar el entorno

El archivo `.env` (con credenciales reales) **no está en el repo**. Copiar desde la plantilla:

```bash
cp .env.example .env
php artisan key:generate
```

Editar `.env` y completar las credenciales de Supabase **(se pasan por interno)**:

```
DB_CONNECTION=pgsql
DB_HOST=aws-1-us-west-2.pooler.supabase.com
DB_PORT=6543
DB_DATABASE=postgres
DB_USERNAME=postgres.<project-ref>
DB_PASSWORD=<tu_password>
DB_SSLMODE=require
```

| Variable | Valor | Notas |
|---|---|---|
| `APP_NAME` | `WaliTake` | |
| `APP_URL` | `http://localhost:8000` | Dominio de Herd si se usa |
| `DB_CONNECTION` | `pgsql` | PostgreSQL (Supabase) |
| `DB_SSLMODE` | `require` | Conexión segura a Supabase |

> Las credenciales de Supabase se proporcionan por interno. Nunca commitear el `.env` real.

---

## 5. Migraciones

```bash
php artisan migrate
```

Verificar la conexión:

```bash
php artisan db:show
```

---

## 6. Levantar el proyecto (regla de las dos terminales)

### Terminal 1 — Backend

```bash
php artisan serve
```

Sirve la app en http://localhost:8000

### Terminal 2 — Frontend (Vite, hot reload)

```bash
npm run dev
```

Mantener abierta mientras se desarrolla. Abrir http://localhost:8000 en el navegador.

---

## 7. Actualizar tras un `git pull`

Cuando alguien actualice dependencias o migraciones:

```bash
git pull
composer install
npm install
php artisan migrate
```

---

## 8. Comandos útiles

| Acción | Comando |
|---|---|
| Resetear BD + datos de prueba | `php artisan migrate:fresh --seed` |
| Limpiar caché de la app | `php artisan optimize:clear` |
| Listar rutas | `php artisan route:list` |
| Crear modelo + migración + recurso | `php artisan make:model Foo -a` |
| Modo mantenimiento | `php artisan down` / `php artisan up` |