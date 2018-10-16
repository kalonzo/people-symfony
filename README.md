# Lab4tech people symfony 4 project 

[TODO] short project description

## Installation

### DOCKER

* install [docker]
* run `docker-compose up -d`

Container access: http://localhost:8080

### NO DOCKER

[TODO] describe all steps to install apache, mysql, composer install, etc

## Usage

### DOCKER

To see server logs run
```
docker-compose logs web
docker-compose logs mysql
```

To run bash commands
```
docker-compose exec web bash
docker-compose exec mysql bash
```
To stop server
```
docker-compose down --remove-orphans
```
### NO DOCKER

[TODO] describe all steps to install apache, mysql, etc.

[docker]: https://www.docker.com/get-started
