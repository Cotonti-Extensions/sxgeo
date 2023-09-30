<?php
/**
 * SxGeo IP base plugin API
 *
 * @package sxgeo
 * @author original GeoIP Db by https://sypexgeo.net
 * @author Andrey Matsovkin
 * @author Kalnov Alexey <kalnovalexey@yandex.ru>
 */

defined('COT_CODE') or die('Wrong URL');

use cot\plugins\sxgeo\lib\SxGeo;

global $cot_countries;

require_once cot_langfile('sxgeo', 'plug');

$sx_bulkmode = Cot::$cfg['plugin']['sxgeo']['bulkrequests'];

if (empty($cot_countries)) {
    include_once cot_langfile('countries', 'core');
}

/**
 * Contains data for country code and id from last sx_getCountry*() call.
 */
$sx_country = [
	'iso' => '', // ISO 3166-1 code in appear case
	'name' => '', // Country name with Cotonti locale as defined in countries.*.lang.php file
	'id'  => 0 // Country ID used in SxGeoIP base
];

/**
 * Contains info about city from last sx_getCity*() call.
 */
$sx_city = [
	'info' => [],  // basic info, see sx_getCity() function for details
	'ext_info' => [], //extended info, see sx_getCityExt() function for details
];

// bulk mode for multiple calls to GeoIP function during one session
if ($sx_bulkmode) {
	// one time init for whole session
	$SxCountry = new SxGeo(Cot::$cfg['plugins_dir'] . '/sxgeo/data/SxGeo.dat', SXGEO_BATCH);
	$SxCity = new SxGeo(Cot::$cfg['plugins_dir'] . '/sxgeo/data/SxGeoCity.dat', SXGEO_BATCH);

	// Первый параметр - имя файла с базой (используется бинарная БД Sypex Geo)
	// Второй параметр - режим работы:
	// SXGEO_FILE   (работа с файлом базы, режим по умолчанию);
	// SXGEO_BATCH  (пакетная обработка, увеличивает скорость при обработке множества
	//                IP за раз);
	// SXGEO_MEMORY (кэширование БД в памяти, еще увеличивает скорость пакетной обработки,
	//                но требует больше памяти, для загрузки всей базы в память).
}

/**
 * Return country code ISO3166-1 by IP
 * @param string $ip IP address in xxx.xxx.xxx.xxx notation
 * @return string ISO country code in upper case (EN|RU|US|...)
 */
function sx_getCountryCode($ip = null)
{
	global $SxCountry, $sx_bulkmode, $sx_country, $sx_ip;

	if (is_null($ip)) {
        $ip = $sx_ip;
    }
	if (!$SxCountry) {
        $SxCountry = new SxGeo(Cot::$cfg['plugins_dir'] . '/sxgeo/data/SxGeo.dat');
    }
    // возвращает двухзначный ISO-код страны
	$sx_country['iso'] = $iso_code = $SxCountry->getCountry($ip);

    // Если нужно освободить ресурсы - удаляем объект
	if (!$sx_bulkmode) {
        unset($SxCountry);
    }

	return $iso_code;
}

/**
 * Return country name code by IP
 * @param ?string $ip IP address in xxx.xxx.xxx.xxx notation
 * @return string Country name in CMS lang as defined countries.*.lang.php file
 */
function sx_getCountry($ip = null)
{
	global $SxCountry, $sx_bulkmode, $sx_country, $sx_ip, $cot_countries;

    $iso_code = sx_getCountryCode($ip);

    $sx_country['name'] = $country_name = '';
	if ($iso_code && isset($cot_countries[mb_strtolower($iso_code)])) {
		$sx_country['name'] = $country_name = $cot_countries[mb_strtolower($iso_code)];
	}

    // Если нужно освободить ресурсы - удаляем объект
	if (!$sx_bulkmode) {
        unset($SxCountry);
    }

    return !empty($country_name) ? $country_name : $iso_code;
}

/**
 * Return Country ID for further work with SxGeoIP base
 * @param string $ip IP address in xxx.xxx.xxx.xxx notation
 * @return int Country code used in SxGeoIP base
 */
function sx_getCountryId($ip = null)
{
	global $SxCountry,$sx_bulkmode, $sx_country, $sx_ip;

	if (is_null($ip)) {
        $ip = $sx_ip;
    }
	if (!$SxCountry) {
        $SxCountry = new SxGeo(Cot::$cfg['plugins_dir'] . '/sxgeo/data/SxGeo.dat');
    }
	$sx_country['id'] = $result = @$SxCountry->getCountryId($ip);       // возвращает номер страны

	if (!$sx_bulkmode) {
        unset($SxCountry);
    }

	return $result;
}

/**
 * Returns city info array for given IP
 *
 * @param string $ip IP address in xxx.xxx.xxx.xxx notation
 * @return array{
 *     city: array{id: int, float: int, lon: float, name_ru: string, name_en: string},
 *     country: array{id: int, iso: string}
 * }
 */
function sx_getCityInfo($ip = null)
{
	global $SxCity, $sx_bulkmode, $sx_city, $sx_ip;

	if (is_null($ip)) {
        $ip = $sx_ip;
    }
	if (!$SxCity) {
        $SxCity = new SxGeo(Cot::$cfg['plugins_dir'] . '/sxgeo/data/SxGeoCity.dat');
    }
    // возвращает с краткой информацией, без региона
	$sx_city['info'] = $result = @$SxCity->getCity($ip);

    // Если нужно освободить ресурсы - удаляем объект
	if (!$sx_bulkmode) {
        unset($SxCity);
    }

	return $result;
}

/**
 * Returns extended city info array for given IP address
 *
 * @param ?string $ip IP address in xxx.xxx.xxx.xxx notation
 * @return array{
 *     city: array{id: int, lat: float, lon: float, name_ru: string, name_en: string},
 *     region: array{id: int, name_ru: string, name_en: string, iso: string},
 *     country: array{id: int, iso: string, lat: float, lon: float, name_ru: string, name_en: string}
 *  } Array with city info
 */
function sx_getCityInfoExt($ip = null)
{
	global $SxCity,$sx_bulkmode, $sx_city, $sx_ip;

	if (is_null($ip)) {
        $ip = $sx_ip;
    }
	if (!$SxCity) {
        $SxCity = new SxGeo(Cot::$cfg['plugins_dir'] . '/sxgeo/data/SxGeoCity.dat');
    }
	$sx_city['ext_info'] = $result = @$SxCity ->getCityFull($ip); // возвращает полную информацию о городе и регионе

    if (!$sx_bulkmode) {
        unset($SxCity);
    }

	return $result;
}

/**
 * Returns city name by IP address
 * @param ?string $ip IP address in xxx.xxx.xxx.xxx notation
 * @return string City name (in russian/english locale) if exists in DB
 */
function sx_getCity($ip = null)
{
	$cityInfo = sx_getCityInfo($ip);
    $key = in_array(cot::$usr['lang'], ['ru', 'ua', 'be']) ? 'name_ru' : 'name_en';

	return !empty($cityInfo['city'][$key]) ? $cityInfo['city'][$key] : '';
}

