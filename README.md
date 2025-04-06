COMANDOS DE INSTALACION:
<br><br>

git clone https://github.com/maglio-quiroga/LaravelTSW.git
<br>
Desde la ruta C:\xampp\htdocs\nombreDeTuProyecto , usa el siguiente comando para entrar a tu repositorio cd C:/xampp/htdocs/nombreDeTuProyecto
<br>
Dentro de tu repositorio ya clonado usa los siguientes comandos:
<br>
composer install
<br>
cp .env.example .env
<br>
php artisan key:generate
<br>
php artisan migrate --seed
<br>
npm install (no necesario)
<br>
npm run dev (no necesario)
<br>
php artisan serve (no necesario) 
<br>

