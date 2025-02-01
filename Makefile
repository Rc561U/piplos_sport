DOCKER_COMPOSE = docker/docker-compose.yml


up:
	docker-compose -f $(DOCKER_COMPOSE) up -d

upl:
	docker-compose -f $(DOCKER_COMPOSE) up

fup:
	docker-compose -f $(DOCKER_COMPOSE)  up --build

build:
	docker-compose -f $(DOCKER_COMPOSE) build

down:
	docker-compose -f $(DOCKER_COMPOSE) down

restart: down up

logsn:
	docker-compose -f $(DOCKER_COMPOSE) logs nginx -f

shell:
	docker-compose -f $(DOCKER_COMPOSE) exec php-fpm bash

clean:
	docker-compose -f $(DOCKER_COMPOSE) down -v

rebuild: down build up
