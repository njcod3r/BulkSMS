<?php

require_once("BulkSMS.php");


$obj = new BulkSMS('E7GEZLY', 'BSMS','http://smsbulk.eg.mobizone.mobi/BSMS/BSendAPI?');

//message body , language , recipient , sender
$obj->sendSMS('The reservation confirm ', 'en' , 201281264677 ,'E7gezly');

?>