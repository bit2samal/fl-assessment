# Weather forcast API

This application built using laravel framework

## To run this application
- Add `APP_KEY` & `WEATHER_API_KEY` in `docker-compose.yml` file 
  (Note: if you are not using docker then please copy environment variables from `docker-compopse.yml` to `.env` file)
- Run `docker-compose up --build` from the project directory.
- Run `docker exec -it fl-assessment bash` to start container's bash console, and run  `php artisan migrate` to migrate database.

#### You can find Postman API collection `Weather assesessment.postman_collection.json`


