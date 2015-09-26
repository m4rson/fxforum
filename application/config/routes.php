<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'site';
$route['home'] = 'site/index';
$route['register'] = 'users/create';
$route['login'] = 'users/login';
$route['logout'] = 'users/logout';
$route['forum'] = 'posts/index';
$route['forum/(:any)'] = 'posts/index';
$route['forum/search'] = 'posts/search';
$route['posts/search/(:any)'] = 'posts/search';
$route['chat'] = 'messages/index';
$route['calendar'] = 'site/display';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
