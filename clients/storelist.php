<html>
<head>
<meta charset="UTF-8">
<meta name= "viewport" content="width=device-width, initial-scale=1">
<link rel = "stylesheet" href = "http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src = "http://code.jquery.com/jquery-1.11.3.min.js"></script> 
<script src = "http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

<script>
function sess(){
	var aa = String(Android.Loginable());
	if(aa == "0"){
		Android.showToast("로그인 해주세요");
	}
}
function submitss(tt){
	if(Android.Loginable() == "0"){
		Android.showToast("login 해주세요");
		Android.loginGos();
	}else{
		$("input[name=cusorpro]").val(Android.getConfirm());
		//Android.showToast(""+Android.getConfirm());
		//Android.showToast(""+$(tt).find("input[name=stname]").val());
		//Android.showToast(""+$(tt+" input[name=stname]").val());
		tt.parentNode.submit();
	}
}
</script>
<style>
.sssss{
     display:block;
}
.main{
     background-color: silver;
     display:flex;
     border: 1px solid black;
}
.main_common{
    display: inline-block;
    float: left;
    width: 125px;
    height: 125px;
    border: 1px solid black;
}
#divss{
    overflow:hidden;
}
</style>
<body>
<div id="divss" data-role="page">
<a id="aaaa"></a>
<?php
$a = $_GET['store'];
//$b = $_POST['ids'];
//$c = $_POST['pwds'];
system("echo $a | sudo python3 ../python/itemviewlist.py");
echo ("<script>sess();</script>");
?>
</div>
</body>
</html>
