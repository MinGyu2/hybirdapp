<?php
$st = $_POST['sname'];
$in = $_POST['iname'];
echo $st;
echo $in;
if($st == '' || $in ==''){
	echo "error";
	exit();
}
system('echo "'.$st.'\n'.$in.'\n" | sudo python3 ../python/itemdel.py')
?>
