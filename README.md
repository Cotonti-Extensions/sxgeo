SxGeo IP base
============

Extension for [Cotonti CMF](https://www.cotonti.com). Integration of SxGeo IP base (geo names supplied in English and Russian)

Plugin authors: [Andrey Matsovkin](https://www.cotonti.com/users/Macik), [Kalnov Alexey](https://www.cotonti.com/users/Alex300)

Plugin page: https://www.cotonti.com/extensions/mobile-geolocation/sxgeoip

Description
-----------

Integration of SxGeoIP database in Cotonti CMF. This DB contains Geo coordinates related to user IP-address.
SxGeoIP created, developed and maintained by https://sypexgeo.net/ and distributed under BSD licence.

Features
--------

* Fast query speed
* Country and city detection
* Good data cover for ex-USSR area
* All cities names in english and russian locales

DataBase updates
-------------

- You can see the database update date in the plugin here: https://github.com/Cotonti-Extensions/sxgeo/tree/master/plugins/sxgeo/data
- Current SxGeo IP database version: https://sypexgeo.net/ru/download/

Demo page
---------

You can view demo page at https://sypexgeo.net/ site.

Requirements
------------

Current version requires Cotonti Siena v0.9.23 and newer.



### Comments

Plugin works out from the box. For better results check config settings in admin panel.


### How extension works

Extension use GeoIP data packed in SxGeoIP format files. Country and city info stored in 
separate files.
More info about SxGeoIP format you can find on https://sypexgeo.net/.


Install
-------

* Unpack, copy files to root folder of your site.
* Install via Admin → Extensions menu (`Administration panel → Extensions`)
* Checks setting in config (`Administration panel → Extensions → sxgeo → Configuration`).

### Usage

You can use this extension data in 2 ways:

1. Through functions call for `sx_getCity($ip)` and `sx_getCountry($ip)`. These functions
return string with Country and City name respectively.
You can ommit IP address. In this case you get info according to current user info.

Examples:
```php
{PHP|sx_getCity('8.8.8.8')}
{PHP.usr.ip|sx_getCountry($this)}
```

__Important notes!__  Country names are always geted in current Cotonti locale (user selected language),
according to `countries.*.lang.php` file. City names are returned by plugin __in english or russian__ 
(as it sored in SxGeoIP DB).

2. You can turn on `Auto initialization mode`, so you can use direct values for current user country and city 
info.

Data format:

```php
/**
 * Contains data for country code and id from last sx_getCountry*() call.
 */
$sx_country = [
    'iso' => '', // ISO 3166-1 code in appear case
    'name' => '', // Country name with Cotonti locale as defined in countries.*.lang.php file
    'id'  => 0, // Country ID used in SxGeoIP base
];

/**
 * Contains info about city from last sx_getCity*() call.
 */
$sx_city = [
    'info' => [],  // basic info, see sx_getCity() function for details
    'ext_info' => [], //extended info, see sx_getCityExt() function for details
];
```

Use this calls in TPL:
```
city - {PHP.sx_city.info.city}
country - {PHP.sx_country.name}
```


Licence
-------

Distributed under BSD license.


Author
------

[Andrey Matsovkin](https://github.com/macik/) - author of Cotonti extension.
All other rights belongs to http://sypexgeo.net/ as DB creator.

References
----------

* [Cotonti.com](http://Cotonti.com/) -- Home of Cotonti CMF
* [sxgeo on GitHub](https://github.com/macik/cot-sxgeo) -- Latest version of sxgeo on GitHub
