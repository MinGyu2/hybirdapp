<?php
$sname = $_POST['sname'];
$id =  $_POST['id'];
if($sname == "" || $id == ""){
        echo "error!";
        exit();
}
system("echo '$sname\n$id' |sudo python3 ../python/orderlistP.py");
?>
