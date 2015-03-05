<?php
	file_put_contents("tb_speed.txt",  '<?php  
	header("Content-type: text/plain; charset=utf-8");
	header("Cache-Control: no-store, no-cache, must-revalidate");
	header("Pragma: no-cache"); 
	echo '.$_POST['amount']>=0?($_POST['amount']):'0'.';
	?>');
echo $_POST['amount'];
?>