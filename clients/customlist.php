<html>
<head>
<meta charset="UTF-8">
<meta name= "viewport" content="width=device-width, initial-scale=1">
<link rel = "stylesheet" href = "http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src = "http://code.jquery.com/jquery-1.11.3.min.js"></script> 
<script src = "http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js">
</script>
<script>
function submitss(tt){
	//Android.showToast("OK!!"+$(tt).find("input[name=sname]").val());
	Android.customOrder($(tt).find("input[name=sname]").val(),$(tt).find("input[name=id]").val());
	//tt.parentNode.submit();
}
</script>
</head>
<body>
<ul id = "parent-list">
<?php
$sname = $_POST['sname'];
$id = $_POST['id'];
$pwd = $_POST['pwd'];
if($sname == "" || $id == "" || $pwd ==""){
	echo "error";
	exit();
}
exec("echo '$sname\n$id\n$pwd' |sudo python3 ../python/storeIdCk.py",$o,$e);
if($o[0] == 2){
	system("echo '$sname' |sudo python3 ../python/customlist.py");
}else{
	echo "fail";
}
?>
</ul>
</body>
</html>
