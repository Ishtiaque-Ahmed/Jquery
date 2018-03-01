

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
/**
* 
*/


$debug=true;
$script_id = 3;
$cfgobj = new mgnsconfig();
//Mage::log("Cron Job ".date('Y-m-d H:i:s')."\n".getcwd(), null, 'netsuitUpdate.log');
$storeId    = Mage::app()->getStore()->getId();
$store_id = 2;
$website_id = 2;
$counter=0;
$ncounter=0;
$panamap= array();
$parentattr = array();
$categorymap=array();
$obs_array=array();
$get_members=array();
$types=array();
$custom_members=array();



/*$matrixOptionList = array(
	'custitem8' => 'cablelength',
	'custitem7' => 'classicforprewiredsystems',
	'custitem5' => 'colors',
	'custitem21' => 'volts',
	'custitem22' => 'voltage',
	'custitem25' => 'model_options',
	'custitem17' => 'outback_energycell_re',
	'custitem10' => 'amp_hours',
	'custitem27' => 'battery_size_and_quantity',
	'custitem28' => 'numbermodules',
	'custitem16' => 'rusco_complete',
	'custitem23' => 'volts',
	'custitem3' => 'lengthinfeet',
	'custitem9' => 'cablelength',
	'custitem30' => 'numbermodules',
	'custitem32' => 'heavyduty',
	
);
$default_locations= array(
	'Wisconsin' => 'TSB Wisconsin',
	'New Mexico' => 'TSB New Mexico',
	'Central America' => 'TSB Central America',
);
$storeusergroup=array(
0 =>array(
	'RETAIL' => 'General',
	'MSRP' => '',
    'Amazon Customers' =>'',
    'Fire Mountain Solar' => 'FireMountainSolar',
    'Good Dealer' => 'GoodDealer',
    'PANAMA STOCK PRICE LEVEL' => '',
    'Panama Dealer' => '',
    'Panama Retail' => '',
	'Online Price' => 'NOT LOGGED IN'
	),
2 =>array(
	'RETAIL' => '',
	'MSRP' => '',
    'Amazon Customers' =>'',
    'Fire Mountain Solar' => '',
    'Good Dealer' => '',
    'PANAMA STOCK PRICE LEVEL' => '',
    'Panama Dealer' => 'PanamaDealer',
    'Panama Retail' => 'PanamaRetail',
	'Online Price' => ''
	)
);
$storetierusergroup=array(
0 =>array(
	'RETAIL' => 'General',
	'MSRP' => '',
    'Amazon Customers' =>'',
    'Fire Mountain Solar' => 'FireMountainSolar',
    'Good Dealer' => 'GoodDealer',
    'PANAMA STOCK PRICE LEVEL' => '',
    'Panama Dealer' => '',
    'Panama Retail' => '',
	'Online Price' => 'NOT LOGGED IN'
	),
2 =>array(
	'RETAIL' => '',
	'MSRP' => '',
    'Amazon Customers' =>'',
    'Fire Mountain Solar' => '',
    'Good Dealer' => '',
    'PANAMA STOCK PRICE LEVEL' => '',
    'Panama Dealer' => 'PanamaDealer',
    'Panama Retail' => 'NOT LOGGED IN',
	'Online Price' => ''
	)
);
$customergroups=array(
	'RETAIL' => 'General',
	'MSRP' => '',
    'Amazon Customers' =>'',
    'Fire Mountain Solar' => 'FireMountainSolar',
    'Good Dealer' => 'GoodDealer',
    'PANAMA STOCK PRICE LEVEL' => '',
    'Panama Dealer' => 'PanamaDealer',
    'Panama Retail' => 'PanamaRetail',
	'Online Price' => 'NOT LOGGED IN'
	);*/
	function get_customfields($obj,&$custom_members)
	{


		foreach ($obj as $key => $value) {
				//echo $key." ".$value."<br>";
				$custom_members[$value->scriptId]=get_class($value);
		}

	}
	function get_productfields($obj,&$types)
	{
			foreach ($obj as $key => $value) {
				if(gettype($value)!="NULL")
				{

					if(!is_object($value))
					{
						$types[$key]=gettype($value);
					}
					else
					{
						$types[$key]=get_class($value);
					}
				}
			}

	}

	function print_all_members($obj, &$obs_array,&$get_members,&$types)
	{
		$already=false;
		
		if(!$already)
		{


		$product_array=(array)$obj;
		foreach ($product_array as $key => $value) {
			# code...
			//echo $key."<br>";
			//if($value!=NULL || $value!='')
				if(!is_null($value))
				{
						if(is_object($value))$types[$key]=get_class($value);
						else $types[$key]=gettype($value);
				}
		
				if(get_class($obj)!=NULL)
							{
								if(!in_array($key,$get_members[get_class($obj)]))
										{
											if(gettype($value)!="NULL")
											{
												if(is_object($value))$get_members[get_class($obj)][$key]=get_class($value);
												else $get_members[get_class($obj)][$key]=gettype($value);
											//echo "is type : ".gettype($value)."<br>";
											}
											
										}
								
							}

				{
					if(is_object($value))
					{
						//echo "Object name : ".get_class($value)."<br>";
							if(!in_array(get_class($value),$obs_array))
							{
								$obs_array[]=get_class($value);
								$get_members[get_class($value)]=array();
								print_all_members($value,$obs_array,$get_members,$types);
							}
						//$get_members[get_class($obj)][$value]=gettype($value);
						if(!is_null($value))
							{
									if(is_object($value))$types[$key]=get_class($value);
									else $types[$key]=gettype($value);
							}
						//echo $key." => ".get_class($value)."<br>";
						
					}
					elseif(is_array($value))
					{
						foreach ($value as $key1 => $value1) {
								//echo "array found <br>";
								if(is_object($value1))
								{
									if(!in_array(get_class($value1),$obs_array))
										{
											$obs_array[]=get_class($value1);
											$get_members[get_class($value1)]=array();
											print_all_members($value1,$obs_array,$get_members,$types);
										}
									if(!is_null($value1))
									{
											if(is_object($value1))$types[$value]=get_class($value1);
											else $types[$value]=gettype($value1);
									}

									//echo $value." => ".get_class($value1)."<br>";
								
								}
							}
						
					}
					else
					{
						if(gettype($value)!="NULL")
						//echo  get_class($obj)." => ".$key ." ".gettype($value)."<br>";
						//if( $value!=NULL || $value!='')
						{
							
						//	echo  get_class($obj)." => ".$key ." ".$value."<br>";
							//echo "not null  ".get_class($obj)." => ".$key ." ".$value."<br>";
							if(get_class($obj)!=NULL)
							{
								if(!in_array($key,$get_members[get_class($obj)]))
								{
									
											if(is_object($value))$get_members[get_class($obj)][$key]=get_class($value);
											else $get_members[get_class($obj)][$key]=gettype($value);

										
								}
								//$get_members[]=$key;
							}
						}
						
						/*if(get_class($obj)!=Array)
						{
							if(in_array(get_class($value),$get_members))
								{
									$get_members[get_class($value)]->members[]=$key;

								}
							else{

									$get_members[get_class($value)]=new member();
									$get_members[get_class($value)]->members[]=$key;
							}
						}*/
					}
			}
		}
	}
}



$batchItemsCount =$cfgobj->getNTSconfig('batchItemsCount');
$itemUpdated =$cfgobj->getNTSconfig('itemUpdated');
$batchItemsCount =1;
//$itemUpdated =1000;
$itemUpdated=0;
//$batchItemsCount=1000;
//if(isset($_REQUEST['sku']))
//$batchItemsCount=30;
$isupdated = false;
 //$qr="select * from netsuit_products_updates order by id asc limit ".$itemUpdated.",".$batchItemsCount." ";
 $qr="select * from netsuit_products order by mg_entity_id desc limit ".$itemUpdated.",".$batchItemsCount." ";
	//$qrrun = mysql_query($qr);
 	$product;
//	echo 'Started from: '.$itemUpdated.' Batch size: '.$batchItemsCount."\n";
	$qrrun = $cfgobj->connection->fetchAll($qr);
	//print_r($qrrun);
	//exit;
	//if(isset($_REQUEST['sku']))
	//$qrrun=array('sku'=>1);
//$upd_post = isset($_REQUEST['update'])?$_REQUEST['update']:'';
// $updatefields = array('name','min_sale_qty','freeshipping','weight','isltl','price','last_price_update','msrp','group_price','tier_price','manufacturer','mpn','country_of_manufacture','watt','type','meta_keyword','meta_description','meta_title','relateditems','warehouse','upsell','shippinginfo','short_description','description','category','battery_size_and_quantity','image','custitem_datasheet1','custitem_datasheet2','custitem_datasheet3','custitem_datasheet4','custitem_datasheet5','enabled','linedescription','excldgoogleshop','hideprice','handlingcost','configurableOptions');
// if(isset($upd_post) && $upd_post!=''){
// 	$updatefields = explode(',',$upd_post);
// }
	foreach($qrrun as $res ){
		///if(true){
		
		//if(isset($_REQUEST['sku']))
		//$res['sku']=$_REQUEST['sku'];
		//$res['sku']='OBP-02380-W';
		//$res['sku']='AQE-100024';
		//$res['sku']='MTS-1060';
		//echo $_REQUEST['sku'];
		//echo $res['sku'];
		//exit;
		//echo '<pre>';
		if($debug){
	//	echo '<pre>';
		}
		//print_r($res);
		$productsobj = new updatemyproductsdata();
		$productar = $productsobj->getProductData($res['sku']);
		$product = (array)$productar[0];
		//$productdata = new productdata($product);
		
		//print_r($productar);
		//print_r($category);
		
		//print_r($product);
		//get_all_objects($product);
		$fake_type=array();
		print_all_members($product,$obs_array,$get_members,$fake_type);
		//print_r($product['customFieldList']->customField);
		get_customfields($product['customFieldList']->customField,$custom_members);
		get_productfields($product,$types);

	   // print_r($obs_array);
	   // print_r($get_members);
	   //	print_r($types);
		//print_r($custom_members);
		break;
		
		



		//exit;

	}
