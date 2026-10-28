
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|   example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|   https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
*/
$route['default_controller'] = 'dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin'] = 'administrator/Admin_dashboard_controller/index';
$route['admin/login'] = 'administrator/admin_auth_controller/index';
$route['admin/logout'] = 'administrator/admin_auth_controller/logout';

# admin kategori
$route['administrator/kategori'] = 'administrator/kategori_controller/index';
$route['administrator/kategori/tambah'] = 'administrator/kategori_controller/tambah_kategori';
$route['administrator/kategori/hapus/(:num)'] = 'administrator/kategori_controller/hapus_kategori/$1';
$route['administrator/kategori/ubah/(:num)'] = 'administrator/kategori_controller/ubah_kategori/$1';

# produk
$route['administrator/produk'] = 'administrator/Produk_controller/index';
$route['administrator/produk/tambah'] = 'administrator/Produk_controller/tambah_produk';
$route['administrator/produk/ubah/(:num)'] = 'administrator/Produk_controller/ubah_produk/$1';
$route['administrator/produk/hapus/(:num)'] = 'administrator/Produk_controller/hapus_produk/$1';
