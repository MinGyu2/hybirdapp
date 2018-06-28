<script>
function sess(){
	Android.showToast("aaa");
	Android.exitss();
}
</script>

<?php
$uid = $_POST['uid'];
$upwd = $_POST['upwd'];
$uname = $_POST['uname'];
$ustore = $_POST['ustorename'];
$uemail = $_POST['uemail'];
$uaddr = $_POST['addrs'];
if($uid == "" || $upwd == "" || $uname==""||$ustore==""||$uemail==""||$uaddr == ""){
        echo "error";
        exit();
}
$phones='';

echo "<script>sess()</script>";
echo $uid.'<br>';
echo $upwd.'<br>';
echo $uname.'<br>';
echo $ustore.'<br>';
echo $uemail.'<br>';
system('echo "'.$uid.'\n'.$upwd.'\n'.$uname.'\n'.$ustore.'\n'.$uemail.'\n'.$uaddr.'\n" | sudo python3 ../python/make.py');
//system('sudo cp ../databases/cpavail.db ../databases/imgdb/'.$ustore.'.db');
//system('sudo chown ubuntu:ubuntu ../databases/imgdb/'.$ustore.'.db');
//system('mkdir img/'.$ustore);

//echo("<script>location.replace('test.html')</script>");

/*
echo $_POST['uid'].'<br>';
echo $_POST['upwd'].'<br>';
echo $_POST['uname'].'<br>';
if($_POST['g'] == '1'){
	echo 'boy<br>';	
}else{
	echo 'girl<br>';
}
echo $_POST['uemail'].'<br>';*/
?>
