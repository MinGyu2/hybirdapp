<?php
$a = $_POST['sname'];
exec("echo '$a'|sudo python3 ../python/storeNameSames.py",$o,$e);
echo $o[0];
?>
