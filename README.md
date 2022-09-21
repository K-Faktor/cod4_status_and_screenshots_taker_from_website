![GitHub Logo](/ss/site.png)

![GitHub Logo](/ss/sreenshot.png)

# CoD4X статус и скриншоты с веб сайта
Это написано на php, чтобы делать скриншоты игроков, играющих на сервере с веб-сайта.
и это также служит средством просмотра состояния сервера cod4x 

1. Делает скриншот игрока с веб-сайта
2. Проверка наличия сервера онлайн/оффлайн
3. Отображает количество игроков онлайн
4. Отображает название карты и скриншот 
5. Отображает название режима игры
6. Отображает скриншоты игроков
```
[Примечание: если у вас есть пользовательские карты, добавьте скриншот карты с расширением jpg с именем mp_CustomMapName.jpg в папку images/maps ]
[например, если имя карты = mp_bubba, то имя изображения должно быть mp_bubba.jpg]
```

Процедура установки
1. Клонируйте файлы в папку webroot или подкаталог.
2. Отредактируйте строки "с 13 по 16" в "index.php".
3. Отредактируйте строки "14 , 15 , 16" в "rcon.ini.php".

Теперь для отображения изображений из любого каталога в веб - браузере

1. Изменить каталог в "строке 10" в "screenshots/index.php"
2. Изменить каталог в "строке 4" в "screendhots/file_viewer.php"
3. Наслаждаться.


Увидеть проект вживую на www.za30cod.ru
