<?php
$sname = $_POST['stores'];
$a = $_POST['ids'];
if($a == "root" || $sname == "root"){ 
	echo "1";
	exit();
}
exec("echo '$sname\n$a'|sudo python3 ../python/scusIdSames.py",$o,$e);
if($o[0] == "0"){
	exec(" [ -d /home/ubuntu/hybridapp/store/$sname/custom/$a ] && echo '1' || echo '0'",$o2,$e2);
	echo $o2[0];
}else{
	echo "1";
}
?>
