<?php
$a = $_POST['email'];
$b1 = mt_rand(0,9);
$b2 = mt_rand(0,9);
$b3 = mt_rand(0,9);
$b4 = mt_rand(0,9);
$b5 = mt_rand(0,9);

$rn = "$b1$b2$b3$b4$b5";
echo "$rn";
system("echo '$a\n$rn'|sudo python3 ../python/sendemail.py");
?>
