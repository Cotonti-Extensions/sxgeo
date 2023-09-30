<?php
/**
 * Localization file for SxGeo IP base
 *
 * @package sxgeo
 * @author Andrey Matsovkin
 * @author Kalnov Alexey <kalnovalexey@yandex.ru>
 */

defined('COT_CODE') or die('Wrong URL');

$L['plu_title'] = 'SxGeo IP база.';

$L['info_desc'] ='Подключение базы SxGeo. Привязка IP адресов к гео-координатам';
$L['info_notes'] = 'Оригинальная база адресов собрана авторами https://sypexgeo.net и распространяется под лицензией BSD.<br />'
    . 'Если мои плагины приносят вам пользу вы можете отблагодарить меня в любой форме. :) Просто напишите мне. <b>Спасибо.</b><br />'
    . '<a href="mailto:kalnovalexey@yandex.ru">kalnovalexey@yandex.ru</a>';

$L['cfg_autoload'] =array('Автоматическая инициализация','В этом режиме данные по IP пользователя будут автоматически преобразованы в информацию о стране и городе. Включите, чтобы использовать данные через теги {PHP.sx_country} и {PHP.sx_city}.');
$L['cfg_bulkrequests'] =array('Включить режим `множественных запросов`','Увеличивает скорость при большом количестве GeoIP запросов к базе, т.к. не очищает данные между вызовами функций.');
$L['cfg_debuglocal'] =array('Использовать тестовые IP данные','используется только при отладке на локальной машине `localhost` (127.0.0.1) и не влияет на работу в остальных случаях.');

$L['sx_your1'] = 'Ваш';
$L['sx_na'] = 'не определено';
$L['sx_your2'] = 'Ваша';
$L['sx_iso_code'] = 'Код страны';
$L['City'] = 'Город';
$L['sx_lat'] = 'Широта';
$L['sx_lon'] = 'Долгота';
$L['sx_city_info'] = 'Массив данных о городе';
$L['sx_city_info_ext'] = 'Массив данных о городе (расширенный)';
$L['sx_localmode'] = 'тестовый режим для localhost';



$adminhelp1 = '';