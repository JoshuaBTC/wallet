Как развернуть
==============

(если не под `root`, выполняем через `sudo`)
1. Запускаем сборку контейнера командой `docker-compose up -d --build`
2. Запускаем контейнер `docker-compose start`
3. Останавливаем контейнер `docker-compose stop`

- Установка docker (например debian): https://docs.docker.com/install/linux/docker-ce/debian/
- Установка docker-compose (требуется docker): https://docs.docker.com/compose/install/

Устанавливаем БД:
1. заходим в контейнер `docker-compose exec php7 bash`
2. запускаем команду ``