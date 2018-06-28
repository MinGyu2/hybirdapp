<?php
$sname = $_GET['store'];
?>
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
<script>
var idable = 0;
function idMoves(str){
	idable = 0;
	if(str.length != 0){
		document.getElementById("btid").disabled = false;
	}else{
		document.getElementById("btid").disabled = true;
		document.getElementById("idcollects").innerHTML = "";
	}
}
function idSearch(str){
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
			ll = this.responseText;
			if(ll == "1"){
				Android.showToast("이미 존재하는 아이디 입니다.");
			}else{
				Android.showToast("사용 가능한 아이디 입니다.");
				document.getElementById("btid").disabled = true;
				idable = 1;
			}
            	}
        };
        xmlhttp.open("POST", "checkId.php", true);
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlhttp.send("ids="+str);
}
function logins(){
	var ids = $("#idtxt").val(),pwds = $("#pwds").val();
	if(ids == "" || pwds == ""){
		Android.showToast("빈칸 존재합니다.");
	}else{
		var xmlhttp = new XMLHttpRequest();
        	xmlhttp.onreadystatechange = function() {
        	if (this.readyState == 4 && this.status == 200) {
                	        ll = this.responseText;
				if(ll=="2\n"){
					Android.loginSuccess(ids,pwds,"1");
					//Android.showToast(""+ll);
				}else if(ll == "1\n"){
					Android.loginSuccess(ids,pwds,"0");
                                	//Android.showToast(""+ll);
                        	}else{
                                	Android.showToast("비번이 틀렸거나 존재하지 않는 아이디 입니다."+ll);
                        	}
                	}
        	};
        	xmlhttp.open("POST", "login2.php", true);
        	xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        	xmlhttp.send("ids="+ids+"&stores=<?php echo $sname;?>&pwds="+pwds);
	}
}
function signs(){
	Android.signs();
}
</script>
<style>
.ddd {
  position: absolute; 
  top: 0; 
  bottom: 0; 
  left: 0; 
  right: 0;
  margin: auto; 
  height: 240px; 
  width: 100%;
}
</style>
</head>
<body style = "width:100%;height:100%" >
<div class="ddd">
	<table class="sss" id="fixheight" width=100%>
		<tr>
                        <td width=10%></td><td width=10%></td>
                        <td width=10%></td><td width=10%></td>
                        <td width=10%></td><td width=10%></td>
                        <td width=10%></td><td width=10%></td>
                        <td width=10%></td><td width=10%></td>
			<td width=10%></td><td width=10%></td>
      	        </tr>
		<tr>
			<td colspan='8'><input style="height:40px;" type="text" name ="uid" id="idtxt" placeholder="아이디"/></td>
			<th colspan='4' rowspan='2'><button style="height:100px;font-size:23px;" type="button" id="logins" onclick="logins()">로그인</button></th>
		</tr>
		<tr>
			<td colspan='8'><input style="height:40px;" type="password" name ="uid" id="pwds" placeholder="비밀번호"/></td>
		</tr>
		<tr>
			<td colspan='4'><button type="button">ID 찾기</button></td>
			<td colspan='4'><button type="button">PWD 찾기</button></td>
			<td colspan='4'><button type="button" onclick="signs()">회원가입</button></td>
		</tr>
	</table>
</div>
</body>
</html>
