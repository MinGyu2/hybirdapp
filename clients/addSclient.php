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
	idable = 1;
	if(str.length != 0){
		document.getElementById("btid").disabled = false;
	}else{
		document.getElementById("btid").disabled = true;
		document.getElementById("idcollects").innerHTML = "";
	}
}
function idSearch(){
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
        xmlhttp.open("POST", "cuscheckId.php", true);
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlhttp.send("ids="+$("#idtxt").val()+"&stores="+$("#snames").val()+"");
}
function hihi(){
	document.getElementById("idcollects").innerHTML = "hihi";
}
function pwdcon(str){
	if(str.length <8){
		document.getElementById("pwds1").innerHTML = "8자 이상";
	}else{
		document.getElementById("pwds1").innerHTML = "";
	}
}
function pwdcon2(str,str2){
	if(str == str2 || str == ""){
		document.getElementById("pwds2").innerHTML = "same";
	}else{
		document.getElementById("pwds2").innerHTML = "diffirent";
	}
}

var stop = 0;
var emable =0
function emailMoves(str){
	emable = 0;
        if(str.length != 0){
                document.getElementById("btemail").disabled = false;
        }else{
                document.getElementById("btemail").disabled = true;
                document.getElementById("emailcollects").innerHTML = "";
        }
	stop = 1;
        $("#emailtimes").hide();
}
var ll ="";
function emailcheck(str){
	var exptext = /^[A-Za-z0-9_\.\-]+@[A-Za-z0-9\-]+\.[A-Za-z0-9\-]+/;
	if(exptext.test(str) == false){
		Android.showToast("*****@*****.**~ 이런 형태로 해주세요");
	}else{
		var xmlhttp = new XMLHttpRequest();
	        xmlhttp.onreadystatechange = function() {
        	if (this.readyState == 4 && this.status == 200) {
         	         ll = this.responseText;
               	         if(ll == "1"){
                                Android.showToast("이미 사용중인 이메일 입니다.");
                        }else{
                                Android.showToast("사용 가능한 이메일 입니다.");
				//emable = 1;
                                document.getElementById("btid").disabled = true;
				document.getElementById("btemail").disabled =true;
		                $("#emailtimes").show();
              			ll="";
                		Android.showToast("success");
                		var xmlhttp = new XMLHttpRequest();
                		xmlhttp.onreadystatechange = function() {
                        		if (this.readyState == 4 && this.status == 200) {
                               			ll = this.responseText;
                        		}
              			};
                		xmlhttp.open("POST", "sendemail.php", true);
                		xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                		xmlhttp.send("email="+str);
                		init();
                        }
                }
        	};
		xmlhttp.open("POST", "cuscheckEmail.php", true);
        	xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        	xmlhttp.send("ids="+$("#emails").val()+"&stores="+$("#snames").val()+"");
	}
}
var interval =null;
var count = 0;
function run(){
        if(stop)
               return;
        document.getElementById("timess").innerHTML = ""+parseInt(count/60)+":"+count%60;
        count-=1;
	if(count < 0)
		return;
}
function init(){
        count = 180;
        stop = 0;
	document.getElementById("timess").innerHTML = ""+parseInt(count/60)+":"+count%60;
	count -=1;
        window.clearInterval(interval);
        interval = window.setInterval("run()",1000);
}
function sendss(str){
	if(str == ll && str != ""){
                $("#emailtimes").hide();
                Android.showToast("인증 성공!");
		emable = 1;
                stop = 1;
        }else
                Android.showToast("인증 실패");
}
function submitss(tt){
        if($("#idtxt").val() == "" || $("#upwd").val() == "" || $("#upwd2").val() == "" || $("#uname").val() == ""|| $("#emails").val() == ""){
                Android.showToast("빈칸 존재");
        }else if(idable == 0 ||  emable == 0){
                Android.showToast("이메일 인증 또는 아이디,가게이름 중복 검사를 해주세요.");
        }else if(document.getElementById("pwds1").innerHTML != ""){
                Android.showToast("8 자이상으로 비번을 해주세요.");
        }else if(document.getElementById("pwds2").innerHTML != "same"){
                Android.showToast("비번이랑 비번확인이 서로다름");
        }else{
                tt.parentNode.submit();
        }
        //Android.showToast("success");
        //Android.exitss();
        //javascript:this.parentNode.submit()
        //this.parentNode.submit();
        //document.getElementById("bybyby").submit();
}
</script>
<body>
<?php 
$a = $_GET['storename'];
?>
<div id = "main">
        <div data-role = "header">
                <h1>main</h1>
        </div>
        <div data-role="content">
		<form action ="addSclient2.php" method="post">
		<table id="fixheight" width=100%>
			<tr>
                                <td width=10%></td><td width=10%></td>
                                <td width=10%></td><td width=10%></td>
                                <td width=10%></td><td width=10%></td>
                                <td width=10%></td><td width=10%></td>
                                <td width=10%></td><td width=10%></td>
                        </tr>
			<tr>
				<td colspan='2' align = center>회원 ID</td>
				<td colspan='5'><input type="text" name ="uid" id="idtxt" onkeyup="idMoves(this.value)"/></td>
				<td colspan='3'><button type="button" id="btid" onclick="idSearch()" disabled>중복검사</button></td>
			</tr>
			<tr>
				<td colspan='10' align=center id = "idcollects"></td>
			</tr>
			<tr>
                                <td colspan='2' align = "center">비밀번호</td>
                                <td colspan='7' align = "center"><input id="upwd" type="password" name = "upwd" onkeyup="pwdcon(this.value)"/></td>
                        </tr>
			<tr>
                                <td colspan='10' align=center id = "pwds1"/>
                        </tr>
			<tr>
                                <td colspan='2' align = "center">비밀번호 확인</td>
                                <td align = "center" colspan='7'><input type="password" name = "upwd2" onkeyup="pwdcon2(this.value,upwd.value)"/></td>
                        </tr>
			<tr>
				<td colspan='10' align=center id = "pwds2"/>
			</tr>
			<tr><td colspan = '10'height='10px'></td></tr>
			<tr>
				<td colspan='2' align = "center">이름</td>
				<td colspan='8'><input type="text" name="uname"/></td>
			</tr>
			<tr>
                                <td colspan='10' align=center id = "storecollects"></td>
                        </tr>
			<tr>
                                <td colspan='2' align = "center">이메일</td>
                                <td colspan='7' align = "center"><input id="emails" type="email" name = "uemail" onkeyup="emailMoves(this.value)"/></td>
				<td colspan='1'><button type="button" id="btemail" onclick="emailcheck(emails.value)" disabled>o</button></td>
                        </tr>
			<tr id="emailtimes" style="display:none">
				<td colspan='3' align = "center"><a id = "timess"></a></td>
				<td colspan='4' align = "center"><input id="rnnum" type="text"></td>
				<td colspan='3' align = "center"><button type="button" onclick="sendss(rnnum.value)">인증</button></td>
			</tr>
			<tr>
                                <td colspan='10' align=center id = "emailcollects"></td>
                        </tr>
		</table>
		<?php
		echo ("<input id = 'snames' type='hidden' name='storenames' value = '".$a."'/>");
		?>
		<button type="button" onclick='submitss(this)'>submit</button>
		</form>
        </div>
        <div data-role = "footer">
                <h2>FIIFIFI</h2>
        </div>
</div>
</body>
</html>
