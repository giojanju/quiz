<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

### Installation

Clone repository and set Apache's or Nginx's document root to public folder.

Run following commands

```
composer install
yarn
yarn dev
```

Copy `.env.example` to `.env` file and edit your db and other configs. Set `APP_DEBUG` to `false` and `APP_ENV` to `production`
```
cp .env.example .env
```

After that, run artisan commands (generate key, migrations and seeders)
```
php artisan key:generate
php artisan migrate --seed
```

**NOTE!** If website fails to run, then run
```
chmod -R 777 storage
```

### Allow access to .tmb folder

If thumbnails are hidden in file manager, make sure you have read access to .tmb folder in Apache/Nginx.

If you're running nginx, add following lines to configuration:
```
location ~ /\.tmb {
    allow all;
}
```
