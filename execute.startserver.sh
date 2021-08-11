cp ".env.example" ".env"
docker-compose down
docker-compose run --rm npm install
docker-compose run --rm npm run dev
docker-compose run --rm laravel php artisan key:generate
docker-compose up --build laravel