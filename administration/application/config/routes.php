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
$route['default_controller']	= 'Login';
$route['404_override'] 			= 'Ecommerce/error_404';
$route['translate_uri_dashes']	= FALSE;

$route['otp']					= 'Manager';
$route['dashboard'] 			= 'Manager/Dashboard';
$route['profile'] 				= 'Manager/Profile';
$route['password']		 		= 'Manager/Password';
$route['logout'] 				= 'Manager/Logout';


$route['categories']	 		= 'Ecommerce/CategoryList';
$route['add-category']			= 'Ecommerce/CreateCategory';
$route['update-category/(:any)']= 'Ecommerce/UpdateCategory/$1';
$route['delete-category']		= 'Ecommerce/DeleteCategory';

$route['brands']	 			= 'Ecommerce/BrandList';
$route['brands/(:any)']	 		= 'Ecommerce/BrandList';
$route['add-brand']				= 'Ecommerce/AddBrand';
$route['update-brand/(:any)']	= 'Ecommerce/UpdateBrand/$1';
$route['delete-brand']			= 'Ecommerce/DeleteBrand';

$route['products']		 		= 'Ecommerce/ListProducts';
$route['products/(:any)']		= 'Ecommerce/ListProduct';
$route['add-product']			= 'Ecommerce/CreateProduct';
$route['update-product/(:any)']	= 'Ecommerce/UpdateProduct/$1';
$route['delete-product']		= 'Ecommerce/DeleteProduct';
$route['search-product']		= 'Ecommerce/SearchProduct';
/*
$route['medicines']		 		= 'Catalogue/MedicineList';
$route['medicines/(:any)']		= 'Catalogue/MedicineList';
$route['add-medicine']			= 'Catalogue/AddMedicine';
$route['update-medicine/(:any)']= 'Catalogue/UpdateMedicine/$1';
$route['delete-medicine']		= 'Catalogue/DeleteMedicine';
*/
$route['blogs']	 				= 'Blog/index';
$route['add-blog']	 			= 'Blog/add';
$route['update-blog/(:any)']	= 'Blog/update/$1';

$route['customers']	 			= 'Reports/CustomersList';
$route['vendors']	 			= 'Reports/VendorsList';
$route['vendor-details/(:any)']	= 'Reports/VendorDetails/$1';
