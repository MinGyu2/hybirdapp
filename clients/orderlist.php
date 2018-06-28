<html>
<head>
<meta charset="UTF-8">
<meta name= "viewport" content="width=device-width, initial-scale=1">
<link rel = "stylesheet" href = "http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src = "http://code.jquery.com/jquery-1.11.3.min.js"></script> 
<script src = "http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>
<body>
<ul>
<?php
$sname = $_POST['sname'];
$id = $_POST['id'];
//echo "$sname $id";
if($sname == "" || $id == ""){
	echo "error!";
	exit();
}
system("echo '$sname\n$id' |sudo python3 ../python/orderlist.py");
?>
</ul>
</body>
</html>
