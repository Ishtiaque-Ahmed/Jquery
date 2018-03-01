<?php
//php-cgi -f updatepdata.php update='category'
//Mage::log("Cron Job ".date('Y-m-d H:i:s')."\n".getcwd(), null, 'netsuitUpdate.log');
$fileRoot = dirname(__FILE__);
require_once $fileRoot.'/PHPToolkit/NetSuiteService.php';
require_once $fileRoot.'/config/config.php';
require_once $fileRoot.'/class/productClass.php';
require_once $fileRoot.'/class/updateProduct.php';
require_once $fileRoot.'/class/vendorData.php';
//$currentscript = file_get_contents($fileRoot.'/run.txt');
//if($currentscript==1)
//exit;
$debug=true;
$magento_attr=array();

$attributes = Mage::getResourceModel('catalog/product_attribute_collection')
   ->getItems();

foreach ($attributes as $attribute){
   //echo $attribute->getAttributecode()." ".$attribute->getBackendType();
   //echo '<br>';
	$magento_attr[$attribute->getAttributecode()]=$attribute->getBackendType();
  // echo $attribute->getFrontendLabel();
}