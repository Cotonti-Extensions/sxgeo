<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=tools
[END_COT_EXT]
==================== */

/**
 * SxGeo IP base
 *
 * @package sxgeo
 * @author original GeoIP Db by https://sypexgeo.net
 * @author Andrey Matsovkin
 * @author Kalnov Alexey <kalnovalexey@yandex.ru>
 *
 * @var string $sx_ip
 * @var string $plugin_body
 */

defined('COT_CODE') or die('Wrong URL.');

$plug_name = 'sxgeo';
$base_path = Cot::$cfg['plugins_dir'] . "/$plug_name";

require_once cot_incfile('sxgeo', 'plug');
$tt = new XTemplate(cot_tplfile('sxgeo', 'plug'));
$sx_toolsmode = true;

$sx['country'] = sx_getCountry($sx_ip);
$sx['city'] = sx_getCityInfo($sx_ip);
$sx['cityTitle'] = sx_getCity($sx_ip);
$sx['city_txt'] = print_r($sx['city'],1);
$sx['city_ext'] = sx_getCityInfoExt('95.25.162.250'); //$sx_ip);
$sx['city_ext_txt'] =  print_r($sx['city_ext'],1);

$tt->assign('sx', $sx);
$tt->parse();
$plugin_body .= $tt->text();