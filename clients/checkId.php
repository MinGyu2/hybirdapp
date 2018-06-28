<?php
$a = $_POST['ids'];
exec("echo '$a'|sudo python3 ../python/storeIdSames.py",$o,$e);
echo $o[0];
?>
