<?php
$sname = $_POST['sname'];
$iname = $_POST['iname'];
$id = $_POST['id'];
$pwd = $_POST['pwd'];
$price = $_POST['price'];

if($sname == "" || $iname =="" || $id == "" || $pwd == ""){
	echo "error!";
	exit();
}

exec(" [ -d /home/ubuntu/hybridapp/store/$sname/custom/$id ] && echo '1' || echo '0'",$o2,$e2);
if($o2[0] == 1){
        //id 존재 하고 있음1 or 0
        exec("echo '$sname\n$id\n$pwd' |sudo python3 ../python/cusidKnow.py",$o,$e);
        if($o[0] == 1){
		system("echo '$sname\n$iname\n$id\n$price' |sudo python3 ../python/orderss.py");
		echo "주문 완료!$sname$iname";
		exit();
	}
}
echo "fails!";
?>
