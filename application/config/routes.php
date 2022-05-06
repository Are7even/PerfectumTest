<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['main'] = 'main';
$route['main/add'] = 'main/addItem';
$route['main/update/(:any)'] = 'main/updateStatusItem/$1';
$route['main/delete/(:any)'] = 'main/deleteItem/$1';

$route['category'] = 'category';
$route['category/add'] = 'category/addCategory';
$route['category/update/(:any)'] = 'category/updateStatusCategory/$1';
$route['category/delete/(:any)'] = 'category/deleteCategory/$1';
