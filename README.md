# MiniQA

## is a shaved-down issue reporting & tracking system

## Tech & Tools:

-   Laravel (v10 base)
-   Vue 3: Composition API with `script setup`
-   Tailwind CSS
-   [DaisyUI](https://daisyui.com/)
-   [SweetAlert](https://sweetalert2.github.io/)

## Features:

-   Functional design
-   Support for file uploads
-   Elegant Responsive UI
-   Automatic File Cleanup on Issue close using Jobs

## Code Style/Format Treatment

[Laravel Pint](https://laravel.com/docs/10.x/pint) with stock config & [Prettier](https://prettier.io)

## Local Dev Env Setup

### Install Dependencies

```bash
composer install
npm install
```

### Set Environment Variables

```
cp .env.example .env
```

### Migrations

```bash
php artisan migrate --seed
```

### Run Dev Server

```bash
php artisan serve
```

### Compile Vue.js

```bash
npm run dev
```

### Storage Symlink

```bash
php artisan storage:link
```

### Run Queue

```bash
php artisan queue:work
```
