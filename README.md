Задание: Фруктовый сад ООП

При выполнении задании проект был развернут с помощью Docker и docker-compose
Используемые контейнеры:
    -  php (С композером)
    -  nginx
    -  mysql
    -  phpmyadmin

Если вы также используете Docker и docker-compose то можете развернуть проект выполняя
следующие действия
1. Собрать контейнеры докера с помощью команды - ``docker-compose build --no-cache``.
2. Если у вас есть возможность использовать ``make`` команды то можете запустить контейнеры через команду - ``make up``, если нет то выполните команду ``docker-compose up -d``
3. Далее надо выполнить команду - ``make composer-install`` или ``docker-compose exec php composer install``

Все готово!

Чтобы попасть на главную страницу перейдите по ссылке [http://localhost](http://localhost)

Для запуска тестов введите команду - ``make test`` или ``docker-compose exec php ./vendor/bin/phpunit tests/Unit``
