<p align="center"><a href="https://symfony.com" target="_blank">
    <img src="https://symfony.com/logos/symfony_black_02.svg">
</a></p>

## Pixel federation blog - Michal Kristof

## Initialization

```bash
composer-install
```

### Build docker image and containers
```bash
docker-compose up -d --build
```

### Open shell console container service with symfony app
```bash
docker-compose exec www sh
```

### Run command for migrations
```bash
php bin/console doctrine:migrations:migrate
```

### Run command for doctrine fixtures to load data
```bash
php bin/console doctrine:fixtures:load
```

### compile tailwind css clases
```bash
npx tailwindcss -i ./assets/styles/app.css -o ./public/build/app.css --watch
```

### App is running on
<localhost:8008>
### Mysql database is running on
<localhost:8080>