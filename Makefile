DOCKER = docker compose

bash:
	$(DOCKER) exec php bash

up:
	$(DOCKER) up

upd:
	$(DOCKER) up -d

down:
	$(DOCKER) down

build:
	$(DOCKER) build
