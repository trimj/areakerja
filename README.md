Install Steps
1. `git clone https://github.com/sayamagang/areakerja.git`
2. Edit database pada `.env`
3. `composer install`
4. `composer dump-autoload`
5. `npm install`
6. `php artisan key:generate`
7. `php artisan migrate:fresh --seed`
8. `php artisan optimize:clear`

Terminal 1 (Dev)
1. `php artisan serve`

Terminal 2 (Dev)
1. `npm run watch`

NGROK
`ngrok http --scheme=http 8000`
