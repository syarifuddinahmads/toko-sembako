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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// product
$route['product/list'] = 'ProductController/listProduct';
$route['product/add'] = 'ProductController/addProduct';
$route['product/save'] = 'ProductController/saveProduct';
$route['product/edit'] = 'ProductController/editProduct';
$route['product/delete'] = 'ProductController/deleteProduct';
$route['product/update'] = 'ProductController/updateProduct';

// product category
$route['product/category/list'] = 'ProductCategoryController/listCategoryProduct';
$route['product/category/add'] = 'ProductCategoryController/addCategoryProduct';
$route['product/category/save'] = 'ProductCategoryController/saveCategoryProduct';
$route['product/category/edit'] = 'ProductCategoryController/editCategoryProduct';
$route['product/category/delete'] = 'ProductCategoryController/deleteCategoryProduct';
$route['product/category/update'] = 'ProductCategoryController/updateCategoryProduct';

// Auth
$route['login'] = 'LoginController/loginView';
$route['login/process'] = 'LoginController/doLogin';
$route['logout'] = 'LoginController/logout';

// Transaction
$route['transaction/list'] = 'TransactionController/listTransaction';
$route['transaction/add'] = 'TransactionController/addTransaction';
$route['transaction/save'] = 'TransactionController/saveTransaction';

// product
$route['customer/list'] = 'CustomerController/listCustomer';
$route['customer/add'] = 'CustomerController/addCustomer';
$route['customer/save'] = 'CustomerController/saveCustomer';
$route['customer/edit'] = 'CustomerController/editCustomer';
$route['customer/delete'] = 'CustomerController/deleteCustomer';
$route['customer/update'] = 'CustomerController/updateCustomer';
