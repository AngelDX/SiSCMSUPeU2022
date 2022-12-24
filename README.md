## CMSUPeU
Desarrollado en laravel 9 usando tailwindcss y livewire

## Pasos para levantar el proyecto

Como el servidor de faker para imagenes actualmente no descarga, cambiamos el proveedor de imagenes en el siguiente archivo: vendor\fakerphp\faker\src\Faker\Provider\Image.php

    public const BASE_URL = 'https://placehold.jp';
    
    En la linea 145
    curl_setopt($ch, CURLOPT_FILE, $fp); //existing line
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);//new line
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//new line
    $success = curl_exec($ch) && curl_getinfo($ch, CURLINFO_HTTP_CODE) === 200;//existing line

- Cambiamos el archivo de configuración de base de datos .env
- Descargamos las dependencias composer
```bash
composer install
```
- Descargamos las dependencias Node
```bash
npm install
```
- Ejecutamos las migraciones y seeders:
```bash
php artisan migrate:fresh --seed
```
- Esto tomara un tiempo por las descargas de 100 imagenes
- Levantamos el servidor de desarrollo
```bash
php artisan serve
```
```bash
npm run dev
```
