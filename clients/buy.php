<?php
$stname = $_POST['stname'];//store name
$name = $_POST['name'];//item name
$price = $_POST['price'];//price
$cxt = $_POST['context'];//내용
$tf = $_POST['cusorpro'];//가게 주인인지 고객인지
if($stname == "" || $name == "" ||$price == "" || $cxt == "")
	die("error!");
?>
<html>
<head>
<meta charset="UTF-8">
<meta name= "viewport" content="width=device-width, initial-scale=1">
<link rel = "stylesheet" href = "http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src = "http://code.jquery.com/jquery-1.11.3.min.js"></script> 
<script src = "http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

<script>
var sname = "<?php echo $stname;?>";
var name = "<?php echo $name;?>";
function sess(){
	var aa = String(Android.Loginable());
	if(aa == "0"){
		document.getElementById("aaaa").innerHTML = "error";
	}else{
		Android.showToast(Android.getIDs() +" : "+ Android.getPWDs() +"\n"+sname+" : "+name);	
	}
}
<?php
if($tf == "0"){
echo "
function submitss(tt){
	if(Android.Loginable() == '0'){
		Android.showToast('login 해주세요');
		Android.loginGos();
	}else{
		//tt.parentNode.submit();
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
				ll = this.responseText;
				Android.showToast(ll);
				window.history.back();
		    	}
		};
		xmlhttp.open('POST', 'orderss.php', true);
		xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		xmlhttp.send('sname=$stname&iname=$name&id='+Android.getIDs()+'&pwd='+Android.getPWDs()+'&price=$price');
	}
}";}
else{
echo"
function deletes(){
	Android.showToast('삭제');
	if(Android.Loginable() == '0'){
                Android.showToast('login 해주세요');
                Android.loginGos();
        }else{
                //tt.parentNode.submit();
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                                ll = this.responseText;
                                Android.showToast(ll);
                                window.history.back();
                        }
                };
                xmlhttp.open('POST', 'itemdelets.php', true);
                xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		xmlhttp.send('sname=".$stname."&iname=".$name."');
        }

}
";
}
?>
</script>
<style>
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
<div class=".main_common">
<?php
//echo "<form action='orderss.php' method='post'>";
echo "<h1>".$name."</h1>";
echo "<img width = '400' height = '400' src='../store/".$stname."/img/".$name."/1.jpg' />";
echo $price."<br>";
echo $cxt;
echo ("<h1 id = 'aaaa'></h1>");
if($tf == "0")
	echo "<button id='' type = 'button' onclick='submitss(this)' >주문</button>";
else
	echo "<button id='' type = 'button' onclick='deletes()' >삭제</button>";
//echo $tf;
//echo "</form>";
//echo ("<script>sess();</script>");
?>
</div>
</body>
</html>
