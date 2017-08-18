<?php 
session_start();

function __autoload($class)
{
	global $_PATH;
	$pos=strpos($class,"Lib");
	$file=($pos==false)?$_PATH['adminPrefix']."classes/".$class.".php":"lib/".$class.".php";
	if(file_exists($file)){require_once($file);}else{mail("krishan1801@gmail.com","Diaspora file not found","File not found : ".$file);}
}
date_default_timezone_set ("Asia/Kolkata");
$all_class=scandir($_PATH['adminPrefix']."classes/");
//$all_libs=scandir("lib/");

/*********************************Check only php files*******************/
foreach($all_class as $files)
{
   $allfiles=explode('.',$files);
   if(in_array($allfiles[1],array("php")))
   {
	   $new_class[]=$files;
   }
}

/*foreach($all_libs as $fil)
{
   $allfil=explode('.',$fil);
   if(in_array($allfil[1],array("php")))
   {
	   $new_libs[]=$fil;
   }
}*/
/*********************************Check only php files*******************/

$exclude=array(".","..");
$all_classes=array_diff($new_class,$exclude);
foreach($all_classes as $class)
{
	$temp_class=substr($class,0,strpos($class,"."));
	$$temp_class=new $temp_class;
}

/*$all_lib=array_diff($new_libs,$exclude);
foreach($all_lib as $libs)
{
	$temp_libs=substr($libs,0,strpos($libs,"."));
	$$temp_libs=new $temp_libs;
}*/



//$dashboard->url_generate();
//$database->generate();
?>