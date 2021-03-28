DOCKER_NAME := app

up:
	docker-compose -p $(DOCKER_NAME) -f ./docker/docker-compose.yml up -d --remove-orphans

build:
	docker-compose -p $(DOCKER_NAME) -f ./docker/docker-compose.yml build

stop:
	docker-compose -p $(DOCKER_NAME) -f ./docker/docker-compose.yml stop

clean:
	make stop
	docker rm $(shell sudo docker ps -a -q)

clean-full:
	docker rmi -f $(shell sudo docker images -q)

logs:
	docker-compose -f ./docker/docker-compose.yml -p $(DOCKER_NAME) logs -f

php:
	docker-compose -f ./docker/docker-compose.yml -p $(DOCKER_NAME) exec php-fpm bash
