<?php
$imgname = "치킨";
exec("echo 보성떡집 |sudo python3 ../python/itemread.py",$outs);
while(list($k,$b) = each($outs)){
        echo $b;
        if($imgname == $b){
                echo "error";
                exit();
        }
}
//echo "aaaaa";
//system("mkdir ../store/2/img/".$imgname."");
/*exec("echo 스토어 | python3 ../python/itemread.py",$outs);
while(list($k,$b) = each($outs)){
	echo $b;
	if("멍" == $b){
		echo "aaa";
		exit();
	}
	//	echo "error";
	//}
}
echo "nbb";*/
?>
