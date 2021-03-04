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
|    example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|    https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|    $route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|    $route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|    $route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:    my-controller/index    -> my_controller/index
|        my-controller/my-method    -> my_controller/my_method
 */
$route['default_controller'] = 'Main_Controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = false;

/* Material Dashboard Template */
$route['md1'] = 'template/MD_controller/page1';
$route['md2'] = 'template/MD_controller/page2';
$route['md3'] = 'template/MD_controller/page3';
$route['md4'] = 'template/MD_controller/page4';
$route['md5'] = 'template/MD_controller/page5';
$route['md6'] = 'template/MD_controller/page6';
$route['md7'] = 'template/MD_controller/page7';
$route['md8'] = 'template/MD_controller/page8';
$route['md9'] = 'template/MD_controller/page9';

/* Material Kit Template*/
$route['mk1'] = 'template/MK_controller/page1';
$route['mk2'] = 'template/MK_controller/page2';
$route['mk3'] = 'template/MK_controller/page3';
$route['mk4'] = 'template/MK_controller/page4';

//test
$route['test'] = 'Main_Controller/test';

//AC_Project
$route['ac'] = 'ac/ACR_Controller';