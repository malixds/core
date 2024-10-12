docker-compose up -d --build
docker-compose run --rm composer i
docker-compose run --rm npm install
docker-compose run --rm npm run build
docker-compose run --rm artisan migrate:fresh --seed
#docker-compose run --rm artisan optimize