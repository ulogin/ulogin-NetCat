Плагин для авторизации в NetCat через социальные сети при помощи сервиса uLogin
http://ulogin.ru
team@ulogin.ru
Лицензия: GPL3

Плагин работает для версий NetCat 3.* и 4.*
Для того, чтобы установить его в конкретную версию системы, может возникнуть необходимость подправить номер версии в самом пакете. Измените третью строку (4.2) файла id.txt на номер вашей версии.


﻿Установка плагина uloginplugin
1. Установка самого плагина
	В админке выбрать меню "Инструменты"->"Установка модуля"
	Выбрать архив, установить. Архив должен быть формата tgz (tar.gz)
2. Размещение кнопок авторизации на сайте
	В админке выбрать меню "Разработка"->"Макеты дизайна"
	Выбрать Ваш макет, найти код формы авторизации (по умолчанию находится в поле "Верхняя часть страницы (Header):" на 31 строке, 	выделен комментариями "<!-- AUTH FORM -->")
	Вставить следующий код сразу после окончания тега </form>(по умолчанию 60 строка)

<script src=http://ulogin.ru/js/ulogin.js></script>
<div id=uLogin x-ulogin-params=display=small&fields=first_name,last_name,photo&providers=vkontakte,odnoklassniki,mailru,facebook&hidden=twitter,google,yandex,livejournal,openid&redirect_uri=http%3A%2F%2F".$_SERVER['HTTP_HOST']."%2Fnetcat%2Fmodules%2Fulogiplugin%2F ></div>
