up:
	docker compose up -d

stop:
	docker compose stop

down:
	docker compose down

cli:
	docker compose exec php-cli bash

npm-dev:
	docker compose exec node npm run dev

npm-build:
	docker compose exec node npm run build

npm-install:
	docker compose exec node npm install

tinker:
	docker compose exec -u 0 php-cli php artisan tinker