<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['adm190/(:any)/(:any)/(:any)'] = 'admin/page/$1/$2/$3';
$route['adm190/(:any)/(:any)'] = 'admin/page/$1/$2';
$route['adm190/(:any)'] = 'admin/page/$1';
$route['adm190'] = 'admin/page';

$route['(:any)/(:any)/(:any)/(:any)'] = 'main/page/$1/$2/$3/$4';
$route['(:any)/(:any)/(:any)'] = 'main/page/$1/$2/$3';
$route['(:any)/(:any)'] = 'main/page/$1/$2';
$route['(:any)'] = 'main/page/$1';
$route['default_controller'] = 'main/page';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
