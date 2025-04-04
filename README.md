COMANDOS DE INSTALACION:

git clone https://github.com/maglio-quiroga/LaravelTSW.git
cd repo
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
npm install (no necesario)
npm run dev (no necesario)
php artisan serve (no necesario) 

