<?php
function write_log($text_to_write)
{
	$text_to_write.="\r\n";
	$text_to_write.="\r\n";
	$text=file_get_contents("log.txt");
	$text_to_write.=$text;
	$success=file_put_contents('log.txt', $text_to_write);
}

for($x=0;$x<10;$x++)
{
	write_log($x);
}
?>