<p align="center"><a href="https://symfony.com" target="_blank">
    <img src="https://symfony.com/logos/symfony_black_02.svg">
</a></p>

## Simple Blog Symfony by Michal Kristof

#### for Pixel Federation

## Project setup

### Prerequisites

* [Docker Desktop](https://www.docker.com/products/docker-desktop)


### Initialization

1. Install dependencies
```bash 
composer-install
``` 
2. Build docker image and containers
```bash
docker-compose up -d --build
```

### Load data

1. Open shell console container service with symfony app
```bash
docker-compose exec www sh
```
2. Run migrations
```bash
php bin/console doctrine:migrations:migrate
```
3. Load data with fixtures
```bash
php bin/console doctrine:fixtures:load
```


### Unit tests
```bash
php bin/phpunit
```

### Open app in browser
* http://localhost:8000

### Mysql database is running on
* http://localhost:8080
* login in .env.test


# Additional

### compile tailwind css clases
```bash
npx tailwindcss -i ./assets/styles/app.css -o ./public/build/app.css --watch
```