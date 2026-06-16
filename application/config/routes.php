<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// =====================
// DEFAULT
// =====================
$route['default_controller']   = 'Informasi';
$route['404_override']         = '';
$route['translate_uri_dashes'] = FALSE;

// =====================
// HALAMAN PUBLIK
// =====================
$route['informasi'] = 'Informasi/index';
$route['home']      = 'home/index';
$route['ppdb']      = 'ppdb/index';
$route['login']     = 'Auth/index';

// =====================
// AUTH PPDB (baru – untuk siswa/orang tua)
// =====================
$route['auth']          = 'Auth/index';      // tampilkan halaman login & register (satu view)
$route['auth/login']    = 'Auth/login';      // POST AJAX → JSON
$route['auth/register'] = 'Auth/register';   // POST AJAX → JSON
$route['auth/logout']   = 'Auth/logout';
$route['auth/forgot']   = 'Auth/forgot';     // lupa password (placeholder)

// =====================
// ADMIN
// =====================
$route['admin']                       = 'Admin/index';
$route['admin/kelola_admin']          = 'Admin/kelola_admin';
$route['admin/tambah_admin']          = 'Admin/tambah_admin';
$route['admin/hapus_admin']           = 'Admin/hapus_admin';
$route['admin/reset_password/(:num)'] = 'Admin/reset_password/$1';
$route['admin/kelola_user']           = 'Admin/kelola_user';
$route['admin/hapus_user']            = 'Admin/hapus_user';
$route['admin/formulir']              = 'Admin/formulir';
$route['admin/hapus_formulir/(:any)'] = 'Admin/hapus_formulir/$1';
$route['admin/edit_formulir']         = 'Admin/edit_formulir';
$route['admin/fetch_data']            = 'Admin/fetch_data';
$route['admin/view_formulir/(:any)']  = 'Admin/view_formulir/$1';
$route['admin/unduh/(:any)']          = 'Admin/unduh/$1';
$route['admin/konfirmasi']            = 'Admin/konfirmasi';