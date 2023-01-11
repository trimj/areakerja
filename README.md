## Development Mode

#### Install Steps

1. `git clone https://github.com/sayamagang/areakerja.git`
2. Edit database pada `.env`
3. `composer install`
4. `composer dump-autoload`
5. `npm install`
6. `php artisan key:generate`
7. `php artisan migrate:fresh --seed`
8. `php artisan optimize:clear`

#### Terminal 1

1. `php artisan serve`

#### Terminal 2

- `npm run watch`
- `npm run dev`

#### Use `ngrok` for secure tunnel (Optional)

- With SSL `ngrok http 8000`
- Without SSL `ngrok http --scheme=http 8000`

## Production Mode

1. Read server requirements https://laravel.com/docs/9.x/deployment#server-requirements
2. Read server configuration https://laravel.com/docs/9.x/deployment#server-configuration
3. Follow these cool instructions https://stackoverflow.com/a/59664416
