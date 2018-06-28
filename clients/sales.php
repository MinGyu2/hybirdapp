<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<meta name= "viewport" content="width=device-width, initial-scale=1">
<link rel = "stylesheet" href = "http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<link rel="stylesheet" href="toast.css"/>
<script src="toast.js" charset="utf-8"></script>
<script src = "http://code.jquery.com/jquery-1.11.3.min.js"></script> 
<script src = "http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>
<body>
<?php
$sname = $_POST['sname'];
$id = $_POST['id'];
$pwd = $_POST['pwd'];

exec("echo '$sname\n$id\n$pwd' |sudo python3 ../python/storeIdCk.py",$o,$e);
if($o[0] == 2){
	system("echo '$sname' |sudo python3 ../python/sales.py");
}else{
	echo "fails";
}
?>
</body>
</html>
