<?php

//example for send text
error_reporting(E_ALL);
ini_set('display_errors', 0);
include 'telegram.php';

$TG = new TGB;
$phones = $TG->fromtxt($argv[2]);
$m = "test";

// $xs = urldecode($z);

$p = $_GET['phone'];
$c = explode('|',$p);
$phones = $c;

switch ($argv[1]){


case "group" :
 

 	$add = $TG->multiTaskMakerAdd($phones);	
	$message = $TG->multiTaskMakerC($phones, $m);


//برای ارسال به گروه ها 
 break;
 
	case "msgs" :
 

 	$add = $TG->multiTaskMakerAdd($phones);
	$message = $TG->multiTaskMakerMsg($phones, $m);

	break;
	
 
}
	 
 var_dump($phones);
	$u = '';

	if (!empty($u))
	{
	$n = 's.jpg';
	$file = $TG->Download($u, $n);
			//$add = $TG->multiTaskMakerAdd($phones);

	$pics = $TG->multiTaskMakerPic($phones, $file);
	$req = array_merge($add, $message, $pics);

	}
	else
	{
	$req = array_merge($add, $message);
	}
$Adds = $TG->multitask($req, $argv[3]);
 
echo $Adds;