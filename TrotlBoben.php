<?php  
	header("Content-type: text/html; charset=utf-8");
	header("Cache-Control: no-store, no-cache, must-revalidate");
	header("Pragma: no-cache"); 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Trotl boben</title>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<style>
<?php 

$data = file_get_contents('./tb_settings.txt', true); 
$data=preg_split('/&/',$data);
?>
body {
	text-align:center;
	overflow:hidden;
	font-family:<?php echo $data[0]; ?>;
	font-size:<?php echo $data[1]; ?>px;
	line-height:<?php echo $data[8]; ?>;
	color:<?php echo $data[2]; ?>;
	background-color:<?php echo $data[3]; ?>;
}
#text {
	text-align:left;
	margin-left: auto;
	margin-right: auto;
	text-align:left;
	position:relative;
	max-width: <?php echo $data[6]; ?>;
	<?php echo $data[4]; ?>
	<?php echo $data[5]; ?>
}
</style>
</head>

<body>
<input type="hidden" name="speed" id="speed" value="0" />
<div name="text" id="text"><?php echo file_get_contents('./text.txt', true); ?></div>
<script>
$(document).ready(function(){
	if(<?php if($data[5]<>'' || $data[4]<>''){echo true;}else{echo false;}; ?>){
		$("#text").css( "margin-top", (-1*$("#text").height())+$(window).height()/1.35+'px');
	}
});

setInterval(function() {
		$.ajax({
			data: { amount : 0 },
			type: 'POST', // GET or POST
			url: './tb_speed_read.php', // the file to call
			success: function(response) {$('#speed').val(response);},
		});	return false;
}, 100);
setInterval(function() {
	$("#text").css( "margin-top", ( $("#text").css("margin-top").replace("px", "")-($('#speed').val()*<?php echo $data[7]; ?>)+"px" ) );
}, 1);

</script>
</body>
</html>
