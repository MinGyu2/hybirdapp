<?php
$storename = $_POST['name'];
system("sudo rm -r img/$storename");
system("sudo rm ../databases/imgdb/$storename".".db");
system("echo $storename | sudo python3 ../databases/delete.py");
?>
