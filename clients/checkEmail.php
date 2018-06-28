<?php
$a =$_POST['emails'];
exec("echo '$a'|sudo python3 ../python/storeEmailSames.py",$o,$e);
echo $o[0];
?>
