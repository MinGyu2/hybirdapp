<script>
function sess(){
        Android.showToast("생성 완료");
        Android.exitss();
}
</script>
<?php
$uid = $_POST['uid'];
$upwd = $_POST['upwd'];
$uname = $_POST['uname'];
$ustore = $_POST['storenames'];
$uemail = $_POST['uemail'];
if($uid == "" || $upwd == "" || $uname==""||$ustore==""||$uemail==""){
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
system('echo "'.$ustore.'\n'.$uid.'\n'.$upwd.'\n'.$uname.'\n'.$uemail.'\n" | sudo python3 ../python/submake.py');
?>
