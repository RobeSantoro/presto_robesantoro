![alt text](https://repository-images.githubusercontent.com/279572925/e6be7d80-0fab-11eb-9971-1d858dc9a238)

# Laravel App Demo Project

This repo is the final excercise of a 3 month coding bootcamp @ Aulab.it

It's a clone of a famous italian platform for second-hand and rentals (subito.it)

It features:

* User Registration and Revisor Priviledges
* Product Publishing with multiple images upload
* Images ranking with Google Vision API to classify pictures and help Revisors to approve posts.
* Product Search
* Product Categories
* Form and mail automation

### Now running on Docker

1. Clone the repository
``` git clone https://github.com/RobeSantoro/presto.git```
2. Enter the directory and run all the following command from there.
```cd presto```
3. Copy .env.example to .env
```cp .env.example .env```
4. Build the app image
```docker-compose build app```
5.  Run the environment in background mode -d
```docker-compose up -d```
6. Check the containers running or check the stack on Docker Desktop
```docker-compose ps```
7. Run `composer install` to install the application dependencies:
```
docker-compose exec app composer install
```
8. Generate Key
```docker-compose exec app php artisan key:generate```
9. Run DB Migration
```docker-compose exec app php artisan migrate```
10. Create Symlink
```docker-compose exec app php artisan storage:link```
11. Create Categories. This is a temporary fix until I'll write the SQL setup in /docker-compose/mysql/init_db.sql. Edit the AppServiceProvider.php with code editor or  run:
```nano ./app/Providers/AppServiceProvider.php```
12. Open the browser at http://localhost:8000/
