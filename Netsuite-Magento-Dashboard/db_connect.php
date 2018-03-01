<?php
//php-cgi -f updatepdata.php update='category'
//Mage::log("Cron Job ".date('Y-m-d H:i:s')."\n".getcwd(), null, 'netsuitUpdate.log');
/*$fileRoot = dirname(__FILE__);
require_once $fileRoot.'/PHPToolkit/NetSuiteService.php';
require_once $fileRoot.'/config/config.php';
require_once $fileRoot.'/class/productClass.php';
require_once $fileRoot.'/class/updateProduct.php';
require_once $fileRoot.'/class/vendorData.php';
require_once('../app/Mage.php'); //Path to Magento
umask(0);
Mage::app();*/


$servername = "localhost";
$username = "";
$password = "";
$dbname = "";

// Create connection
//$conn = new mysql($servername, $username, $password, $dbname);
$conn = new PDO("mysql:dbname=$dbname;host=$servername", $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else
{
	//echo "ok";
}
//$cfgobj = new mgnsconfig();

if(isset($_REQUEST))
{
    if(isset($_POST['get_data']))
    {

    		$sql=$conn->prepare("SELECT * FROM `match`");
    		$result=$sql->execute();
    		if($result)
    		{

    			echo json_encode($sql->fetchAll());

    		}
    		else
    		{
    			echo json_encode($sql->errorInfo());
    		}
    }
    else
    {
	$mg;
	$netsuite=explode(' ',$_POST['selected1']);
	$magento=explode(' ',$_POST['selected2']);
	$newvar=NULL;
	if(count($netsuite)==1)
	{
		$netsuite[0]=NULL;
		$netsuite[]=NULL;
		$newvar=$magento[1];

	}
	if(count($magento)==1)
	{
		$magento[0]=NULL;
		$magento[]=NULL;
		$newvar=$netsuite[1];
	}
	if(isset($_POST['newvar']))
	{
		$newvar=$_POST['newvar'];
	}

	

	//$sql="INSERT INTO match (magento_field_name,magento_field_type,netsuite_field_name,netsuite_field_type,final_data_type) VALUES (ok,ok,ok,ok,'$mg')";
	$statement = $conn->prepare("INSERT INTO `match`(`magento_field_name`, `magento_field_type`, `netsuite_field_name`, `netsuite_field_type`, `final_data_type`) VALUES (:mag,:magtype,:net,:nettype,:fname)");
	$val=$statement->execute(array(
    	"mag"=>$magento[0],
    	"magtype"=>$magento[1],
    	"net"=>$netsuite[0],
    	"nettype"=>$netsuite[1],
    	"fname" => $newvar
	    	
	));


	//$result=mysql_query($sql);
	//$qrrun = $cfgobj->connection->query($sql);
	if($val){
		echo "You have been successfully subscribed.".$mg;
	}
	else
	{
		echo json_encode($statement->errorInfo());
	}
}

}