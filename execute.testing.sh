# Prepare for testing
cp ".env.testing.example" ".env.testing"
docker-compose -f docker-compose.test.yml down
docker-compose -f docker-compose.test.yml run --rm npm install
docker-compose -f docker-compose.test.yml run --rm npm run dev
docker-compose -f docker-compose.test.yml run --rm laravel php artisan key:generate
docker-compose -f docker-compose.test.yml up --build -d laravel

# Wait until the server is ready
docker-compose -f docker-compose.test.yml exec laravel sh -c "while ! curl --output /dev/null --silent --head --fail http://0.0.0.0:3000; do sleep 1 && echo 'Waiting for port 3000 to be open...'; done;"

# Execute a clean reset for the db
docker-compose -f docker-compose.test.yml run --rm laravel php artisan migrate:refresh --seed


# Execute the tests
docker-compose -f docker-compose.test.yml run --rm laravel ./vendor/phpunit/phpunit/phpunit --testsuite Feature Tests

# Shutdown testing environment
docker-compose -f docker-compose.test.yml down
