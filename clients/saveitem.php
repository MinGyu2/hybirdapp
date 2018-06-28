<?php
header('Content-type : bitmap;charset=utf-8');

$imgfile=base64_decode($_POST['img']);
$name = $_POST["name"]; // 가게 이름
$imgname = $_POST["imgname"];
$prices = $_POST["prices"];
$text = $_POST["text"];

if($imgfile=="" ||$name==""||$imgname=="" || $prices =="")
	die("dieeeeee");

exec("echo $name |sudo python3 ../python/itemread.py",$outs);
while(list($k,$b) = each($outs)){
	//echo $b.'<br>';
	if($imgname == $b){
		echo "이미 같은 이름의 상품이 존재 합니다.";
		exit();
	}
}
system("mkdir ../store/".$name."/img/".$imgname."");
$path= "../store/".$name."/img/".$imgname."/1.jpg";
$file = fopen($path,"w+");
if(!$file){echo $path; echo("올리기 실패");exit();}


exec("echo '".$name."\n".$imgname."\n".$prices."\n".$text."' |sudo python3 ../python/iteminsert.py");
echo $prices;
fwrite($file,$imgfile);

exit();
?> 
