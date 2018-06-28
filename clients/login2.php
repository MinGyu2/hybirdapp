<?php
$sname = $_POST['stores'];
$a = $_POST['ids'];
$p = $_POST['pwds'];//"111111111"
exec(" [ -d /home/ubuntu/hybridapp/store/$sname/custom/$a ] && echo '1' || echo '0'",$o2,$e2);
if($o2[0] == 1){
	//id 존재 하고 있음1 or 0
	exec("echo '$sname\n$a\n$p' |sudo python3 ../python/cusidKnow.py",$o,$e);
	echo $o[0];
}else{
	//가게 주인과 비교 해보면 됨
	exec("echo '$sname\n$a\n$p' |sudo python3 ../python/storeIdCk.py",$o,$e);
        echo $o[0];

}
//echo $o2[0];
?>

