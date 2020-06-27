include .env

# Usage : make [task] - make help
.DEFAULT_GOAL := wp

.PHONY: help

help:
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'

build: ## [Docker] Build containers
	docker-compose up -d --build

ps: ## [Docker] Show container list
	docker ps

start: ## [Docker] Start project containers
	docker-compose up -d

stop: ## [Docker] Stop project containers
	docker-compose stop

restart: ## [Docker] Restart project containers
	$(MAKE) stop
	$(MAKE) start

bash: ## [Docker] Launch Server container with bash
	docker-compose exec server bash

migrate: ## [Docker] Launch DB container
	docker exec server php artisan migrate --seed

refresh: ## [Docker] Launch DB container
	docker exec server php artisan migrate:refresh --seed
