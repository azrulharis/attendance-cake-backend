<?php
 


if (!empty($_SERVER['SUBDOMAIN_DOCUMENT_ROOT'])) {
 
	$_SERVER['DOCUMENT_ROOT'] = $_SERVER['SUBDOMAIN_DOCUMENT_ROOT'];
}



/* For All Oher Server */ 
$DOCUMENT_PATH = str_replace( $_SERVER['DOCUMENT_ROOT'], '', str_replace('\\', '/',dirname(dirname(dirname(__FILE__)))));
 
$BASE_PATH = 'http://'.$_SERVER['HTTP_HOST'].$DOCUMENT_PATH.'/ekong/';
 

define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].$DOCUMENT_PATH.'/');

 

define('BASE_URL',$BASE_PATH); 

// Public URL for image on email
define('PUBLIC_URL','http://localhost/ekong/'); 

define('IMAGE_PATH',WWW_ROOT.'img'.DS);

define('FILE_PATH',WWW_ROOT.'files'.DS);

define('USER_IMAGE_PATH',IMAGE_PATH.'Users/');

define('USER_ORIGINAL_IMAGE_PATH',USER_IMAGE_PATH.'Original/');

define('USER_SMALL_IMAGE_PATH',USER_IMAGE_PATH.'Small/');

define('USER_ICON_IMAGE_PATH',USER_IMAGE_PATH.'Icon/');

define('USER_RECEIPT_IMAGE_PATH', WWW_ROOT.'img/Payments/'); 

define('NO_RECORD','No Record Found');

define('ADMIN_ID','1');

define('ADMIN_GROUP_ID','1');

Configure::write('SystemGroup',array('0'=>1,'1'=>2)); 


function _n2($number) {
	return number_format($number, 2);
}

function _n2n($number) {
	return number_format($number, 2, '.', '');
}
?>