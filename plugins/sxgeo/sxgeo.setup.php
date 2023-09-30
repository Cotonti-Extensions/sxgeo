<?php
/* ====================
[BEGIN_COT_EXT]
Code=sxgeo
Name=SxGeo IP base
Category=mobile-geolocation
Description=Integration of SxGeo IP base
Version=1.0.2-2.2.3
Date=2023-09-30
Author=Andrey Matsovkin, Kalnov Alexey (kalnovalexey@yandex.ru), sypexgeo.net
Copyright=Copyright (c) 2011-2013 Andrey Matsovkin, (c) 2023 Kalnov Alexey https://lily-software.com,  https://sypexgeo.net
Notes=Original GeoIP DB created by https://sypexgeo.net and distributed under BSD licence. <br />If your enjoy my plugin please consider donating to help support future developments. <b>Thanks!</b> <br /><a href="mailto:kalnovalexey@yandex.ru">kalnovalexey@yandex.ru</a>
Auth_guests=R1
Lock_guests=W2345A
Auth_members=RW1
Lock_members=2345
Recommends_modules=
Recommends_plugins=
Requires_modules=
Requires_plugins=
[END_COT_EXT]

[BEGIN_COT_EXT_CONFIG]
autoload=01:radio::0:Autoload mode
bulkrequests=05:radio::0:Enable `bulk requests` mode
debuglocal=10:radio::0:Use sample data for debug in localhost (127.0.0.1)
[END_COT_EXT_CONFIG]
==================== */

/**
 * SxGeo IP base plugin for Cotonti CMF
 *
 * @package sxgeo
 * @author original GeoIP Db by https://sypexgeo.net
 * @author Andrey Matsovkin
 * @author Kalnov Alexey <kalnovalexey@yandex.ru>
 * @copyright Copyright (c) 2011-2013 Andrey Matsovkin
 * @copyright Copyright (c) 2013 Kalnov Alexey https://lily-software.com
 * @license Distributed under BSD license.
 */

defined('COT_CODE') or die('Wrong URL.');