<?php
/**
 * Localization file for SxGeo IP base
 *
 * @package sxgeo
 * @author Andrey Matsovkin
 * @author Kalnov Alexey <kalnovalexey@yandex.ru>
 */

defined('COT_CODE') or die('Wrong URL');

$L['plu_title'] = 'SxGeo IP base'; // Title for stand alone

$L['info_desc'] ='Integration of SxGeo IP base'; // plugin description
$L['info_notes'] = 'Original GeoIP DB created by https://sypexgeo.net and distributed under BSD licence.<br />'
    . 'If your enjoy my plugin please consider donating to help support future developments. <b>Thanks!</b><br />'
    . '<a href="mailto:kalnovalexey@yandex.ru">kalnovalexey@yandex.ru</a>';

$L['cfg_autoload'] =array('Autoload mode','Enable it to use {PHP.sx_country} and {PHP.sx_city} data in your templates.');
$L['cfg_bulkrequests'] =array('Enable `bulk requests` mode','If enabled SxGeo object not deleted after function calls.');
$L['cfg_debuglocal'] =array('Use sample IP data','used only for debug in localhost (127.0.0.1)');

$L['sx_your1'] = 'Your';
$L['sx_your2'] = 'Your';
$L['sx_na'] = 'not defined';
$L['sx_iso_code'] = 'Country code';
$L['City'] = 'City';
$L['sx_lat'] = 'Latitude';
$L['sx_lon'] = 'Longtitude';
$L['sx_city_info'] = 'City info data';
$L['sx_city_info_ext'] = 'City info extended data';
$L['sx_localmode'] = 'sample mode enabled for localhost';

$adminhelp1 = '';