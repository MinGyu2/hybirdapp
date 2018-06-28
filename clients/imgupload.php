<?php
header('Content-type : bitmap;charset=utf-8');

$imgfile=base64_decode($_POST['img']);
$name = $_POST["name"]; // 가게 이름
$imgname = $_POST["imgname"];
$text = $_POST["text"];
exec("echo $name | python3 ../databases/itemread.py",$outs);
while(list($k,$b) = each($outs)){
	echo $b.'<br>';
	if($imgname == $b){
		echo "error";
		exit();
	}
}
$path= "img/".$name."/".$imgname.".jpg";
$file = fopen($path,"w+");
if(!$file) die("errorssssfile");


exec("echo '".$name."\n".$imgname."\n".$text."' |sudo python3 ../databases/iteminsert.py");
fwrite($file,$imgfile);
?> 
