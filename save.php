<?php
$arr=[

	"a"=>"User is ".$_POST['username'],
	"b"=>"Comments are ".$_POST['comment']

];
echo implode(" ", $arr);