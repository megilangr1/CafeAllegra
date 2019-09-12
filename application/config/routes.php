<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['Admin/Barang'] = 'Barang';
$route['Admin/Barang/Tambah'] = 'Barang/tambah';
$route['Admin/Barang/Hapus/(:any)'] = 'Barang/hapus/$1';
$route['Admin/Barang/Edit/(:any)'] = 'Barang/edit/$1';
$route['Admin/Barang/Simpan-Perubahan'] = 'Barang/update';

$route['Admin/Group-Produk'] = 'GroupProduk';
$route['Admin/Group-Produk/Tambah'] = 'GroupProduk/tambah';
$route['Admin/Group-Produk/Hapus/(:any)'] = 'GroupProduk/hapus/$1';
$route['Admin/Group-Produk/Edit/(:any)'] = 'GroupProduk/edit/$1';
$route['Admin/Group-Produk/Simpan-Perubahan'] = 'GroupProduk/update';

$route['Admin/Group-Produk-Detail'] = 'GroupProdukDetail';
$route['Admin/Group-Produk-Detail/Tambah'] = 'GroupProdukDetail/tambah';
$route['Admin/Group-Produk-Detail/Hapus/(:any)/(:any)'] = 'GroupProdukDetail/hapus/$1/$2';
$route['Admin/Group-Produk-Detail/Edit/(:any)/(:any)'] = 'GroupProdukDetail/edit/$1/$2';
$route['Admin/Group-Produk-Detail/Simpan-Perubahan'] = 'GroupProdukDetail/update';

$route['Admin/Produk'] = 'Produk';
$route['Admin/Produk/Tambah'] = 'Produk/tambah';
$route['Admin/Produk/Hapus/(:any)'] = 'Produk/hapus/$1';
$route['Admin/Produk/Edit/(:any)'] = 'Produk/edit/$1';
$route['Admin/Produk/Simpan-Perubahan'] = 'Produk/update';

$route['Admin/Group-Material'] = 'GroupMaterial';
$route['Admin/Group-Material/Tambah'] = 'GroupMaterial/tambah';
$route['Admin/Group-Material/Hapus/(:any)'] = 'GroupMaterial/hapus/$1';
$route['Admin/Group-Material/Edit/(:any)'] = 'GroupMaterial/edit/$1';
$route['Admin/Group-Material/Simpan-Perubahan'] = 'GroupMaterial/update';

$route['Admin/Group-Material-Detail'] = 'GroupMaterialDetail';
$route['Admin/Group-Material-Detail/Tambah'] = 'GroupMaterialDetail/tambah';
$route['Admin/Group-Material-Detail/Hapus/(:any)/(:any)'] = 'GroupMaterialDetail/hapus/$1/$2';
$route['Admin/Group-Material-Detail/Edit/(:any)/(:any)'] = 'GroupMaterialDetail/edit/$1/$2';
$route['Admin/Group-Material-Detail/Simpan-Perubahan'] = 'GroupMaterialDetail/update';

$route['Admin/Material'] = 'Material';
$route['Admin/Material/Tambah'] = 'Material/tambah';
$route['Admin/Material/Hapus/(:any)'] = 'Material/hapus/$1';
$route['Admin/Material/Edit/(:any)'] = 'Material/edit/$1';
$route['Admin/Material/Simpan-Perubahan'] = 'Material/update';

$route['Admin/Supplier'] = 'Supplier';
$route['Admin/Supplier/Tambah'] = 'Supplier/tambah';
$route['Admin/Supplier/Hapus/(:any)'] = 'Supplier/hapus/$1';
$route['Admin/Supplier/Edit/(:any)'] = 'Supplier/edit/$1';
$route['Admin/Supplier/Simpan-Perubahan'] = 'Supplier/update';

$route['Admin/Relasi-Material-Supplier'] = 'Relasi';
$route['Admin/Relasi-Material-Supplier/(:any)'] = 'Relasi';
$route['Admin/Relasi-Material-Supplier/(:any)/Tambah'] = 'Relasi/tambah';
$route['Admin/Relasi-Material-Supplier/(:any)/Hapus/(:any)'] = 'Relasi/hapus';

$route['Admin/Perkiraan'] = 'Perkiraan';
$route['Admin/Perkiraan/Tambah'] = 'Perkiraan/tambah';

$route['Admin/Pembelian'] = 'Pembelian';
$route['Admin/Pembelian/Supplier/(:any)'] = 'Pembelian/supplier/$1';
$route['Admin/Pembelian/Material'] = 'Pembelian/material';
$route['Admin/Pembelian/Batal-Pembelian'] = 'Pembelian/batal';
$route['Admin/Pembelian/Tambah'] = 'Pembelian/tambah';
$route['Admin/Pembelian/Hapus/(:any)'] = 'Pembelian/hapus/$1';
$route['Admin/Pembelian/Selesai'] = 'Pembelian/selesai';

$route['Admin/Transaksi-Pembelian'] = 'DataPembelian';

$route['Admin/Print/Pembelian/(:any)/(:any)'] = 'PrintData/pembelian/$1/$2';

$route['Admin/Hutang-Dagang'] = 'HutangDagang';
