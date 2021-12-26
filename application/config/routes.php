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
// Page Redirect URL
$route['default_controller'] = 'SupportController';
$route['support_login'] = 'SupportController/support_login';  

$route['admin-login']='SupportController/login_admin';
$route['Registration']='SupportController/customer_registration';
$route['Logout']='SupportController/support_user_logout';
$route['Customer-List']='SupportController/Customer_List_Details';
$route['change_password']='SupportController/change_password';
$route['GST-Master']='SupportController/gst_master';
$route['product_master']='SupportController/product_master';
$route['purchase_master']='SupportController/purchase_master';
$route['inovice_terms']='SupportController/inovice_terms';
$route['sales_master']='SupportController/sales_master';

// API Link
$route['Customer-Registration']='Api_Controller/customer_registration';
$route['Changed_Status_Customer']='Api_Controller/Changed_Status_Customer';
$route['customer_update_details']='Api_Controller/customer_update_details';
$route['change_password_process']='Api_Controller/change_password_process';
$route['add_new_gst_masters']='Api_Controller/add_new_gst_masters';
$route['update_new_gst_masters']='Api_Controller/update_new_gst_masters';
$route['delete_gst_master']='Api_Controller/delete_gst_master';
$route['add_new_product_masters']='Api_Controller/add_new_product_masters';
$route['Product_Status_Changed']='Api_Controller/Product_Status_Changed';
$route['update_new_product_masters']='Api_Controller/update_new_product_masters';
$route['add_new_purchase_masters']='Api_Controller/add_new_purchase_masters';
$route['add_new_purchase_prod_items']='Api_Controller/add_new_purchase_prod_items';
$route['delete_purchase_temp_master']='Api_Controller/delete_purchase_temp_master';
$route['Puchase_product_vendors']='Api_Controller/Puchase_product_vendors';
$route['inert_new_terms_condition']='Api_Controller/inert_new_terms_condition';
$route['delete_invoice_tables']='Api_Controller/delete_invoice_tables';
$route['autosearch_product']='Api_Controller/autosearch_product';
$route['delete_sales_master']='Api_Controller/delete_sales_master';
$route['delete_purchases_master']='Api_Controller/delete_purchases_master';
$route['delete_productss_master']='Api_Controller/delete_productss_master';

$route['add_new_sale_prod_items']='Api_Controller/add_new_sale_prod_items';
$route['delete_sale_temp_master']='Api_Controller/delete_sale_temp_master';
$route['sale_product_vendors']='Api_Controller/sale_product_vendors';


// Pagination Links
$route['customer_list_data_get']='Datatables_Controller/customer_list_data_get';
$route['gst_master_get_list']='Datatables_Controller/gst_master_get_list';
$route['product_master_list']='Datatables_Controller/product_master_list';
$route['purchase_master_list']='Datatables_Controller/purchase_master_list';
$route['inovice_terms_list']='Datatables_Controller/inovice_terms_list';
$route['sale_master_list']='Datatables_Controller/sale_master_list';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
