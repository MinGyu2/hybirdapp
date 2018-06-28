<?php
$sname = $_POST['stores'];
$a = $_POST['ids'];
exec("echo '$sname\n$a'|sudo python3 ../python/scusEmailsames.py",$o,$e);
echo $o[0];
?>
