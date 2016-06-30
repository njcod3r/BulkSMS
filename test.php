<?php

require_once("BulkSMS.php");


$obj = new BulkSMS('', '','');

//message body , language , recipient , sender
$obj->sendSMS('The reservation confirm ', 'en' , 201281264677 ,'E7gezly');

?>
