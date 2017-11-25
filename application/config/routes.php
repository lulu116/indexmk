<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] 	= 'admin/editPersonInfo';
$route['login'] 				= 'admin/adminLogin';
$route['loginsubmit'] 			= 'admin/adminLoginSubmit';

$route['menu'] 					= 'admin/adminMenuManage';
$route['addmenusubmit'] 		= 'admin/addMenuSubmit';
$route['editmenusubmit'] 		= 'admin/editMenuSubmit';
$route['delmenusubmit'] 		= 'admin/delMenuSubmit';

$route['editor'] 				= 'admin/adminEditorManage';
$route['addeditsubmit'] 		= 'admin/addEditorSubmit';
$route['editeditorsubmit'] 		= 'admin/editEditorSubmit';
$route['deleditorsubmit'] 		= 'admin/delEditorSubmit';

$route['personset'] 			= 'admin/editPersonInfo';
$route['personsubmit'] 			= 'admin/editPersonInfoSubmit';

$route['mkindex'] 				= 'admin/indexCreate';
$route['mkindexsubmit'] 		= 'admin/indexCreateSubmit';

$route['menulist'] 				= 'menucontent/menuContentManage';
$route['addmenuinfo'] 			= 'menucontent/addMenuContentSubmit';
$route['delmenucsubmit'] 		= 'menucontent/delMenuContentSubmit';
$route['preview'] 				= 'indexcontent/indexPreview';



/**--**/

$route['404_override'] 			= '';
$route['translate_uri_dashes'] 	= FALSE;


