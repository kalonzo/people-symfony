# Lab4tech people symfony 4 project 

[TODO] short project description

# DOCKER 

## Docker compose comes with 4 containers
* web - an apache / php container
* mysql - database container
* phpmyadmin - database administation container
* encore - webpack realtime compiler for assets

## Installation

1. Install [docker]
1. Install [git]
1. Clone this repository and go to it 
1. Run containers: `docker-compose up -d`
1. Wait until all containers are up (could be long on first run)

You can follow progress on watching logs:
```
docker-compose logs -f web
docker-compose logs -f mysql
```

6. Log into web container: `docker-compose exec web bash`
6. Migrate database: `php bin/console doctrine:migration:migrate`


## Usage

* Run containers: `docker-compose up -d`
* Go into container to run symfony commands: `docker-compose exec web bash`
* See container logs: `docker-compose ${CONTAINER_NAME} -f web`
* To stop server: `docker-compose down`

You can find more docker commands on [docker-cli] and [docker-compose-cli]

## Testing
Go into web container and run tests
```
docker-compose exec web bash
php bin/phpunit
```


# NO DOCKER

## Installation

[TODO] describe all steps to install apache, mysql, etc.

## Usage

[docker]: https://www.docker.com/get-started
[docker-cli]: https://docs.docker.com/engine/reference/commandline/cli/
[docker-compose-cli]:https://docs.docker.com/compose/reference/
[git]: https://git-scm.com/downloads
