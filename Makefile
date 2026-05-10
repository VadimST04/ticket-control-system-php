DOCKER = docker compose

bash:
	$(DOCKER) exec php bash

up:
	$(DOCKER) up --build

upd:
	$(DOCKER) up -d

down:
	$(DOCKER) down

build:
	$(DOCKER) build

rebuild:
	$(DOCKER) down
	$(DOCKER) up --build
