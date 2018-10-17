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

### Windows 10 Pro x64

* WampServer Version 3.1.0 64bit Installation
 
Download & install from https://sourceforge.net/projects/wampserver/ proced install with PHP 7.1.9 and use MySQL for database server.
 
* Symfony dependency installation 

Download & run Composer-Setup.exe from https://getcomposer.org/doc/00-intro.md . For test composer type 'composer' on a CMD

Donwnload & run node-v8.12.0-x64 from https://nodejs.org/en/ 

Donwnload & run yarn-1.10.1.msi from https://yarnpkg.com/lang/en/docs/install/#windows-stable 

Download & run Git-2.19.1-64-bit.exe from https://gitforwindows.org/ this will install dependency for git project and better termina than classic CMD goes not store your command more than 3 input

* Installing & Setting up the Symfony Framework
With CMD or Git Bash change to your 'www' directory by typing 'cd C:\wamp64\www' and ran composer command 'composer create-project symfony/website-skeleton my-project' .

* Confuguring a Apache Server 
type 'composer require symfony/apache-pack' for run recipe from symfony (install necessary lib in you Apapche)

Add this block to your C:\wamp64\bin\apache\apache2.4.27\conf\extra\httpd-vhosts.conf Alias to point your 'public' folder of Symfony project

  Alias /people-symfony "${INSTALL_DIR}/www/my-project/public"
  <Directory "${INSTALL_DIR}/www/my-project/public">
    Options +Indexes +Includes +FollowSymLinks +MultiViews
    AllowOverride All
    Require local
  </Directory>

*Configuring Smfony project dependency

For Encore (JS/css/Jquery)
First browse to your my-project directory with GIT bash and run 'composer require symfony/webpack-encore-pack' next 'yarn install'. 

For Doctrine (Database)
'composer require symfony/orm-pack' and 'composer require symfony/maker-bundle --dev' 

Configuring .env file at the project racine to point to your database
customize this line!
DATABASE_URL="mysql://root:db_password@127.0.0.1:3306/db_name"

## Usage

[docker]: https://www.docker.com/get-started
[docker-cli]: https://docs.docker.com/engine/reference/commandline/cli/
[docker-compose-cli]:https://docs.docker.com/compose/reference/
[git]: https://git-scm.com/downloads
