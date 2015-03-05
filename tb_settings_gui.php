<?php  
	header("Content-type: text/html; charset=utf-8");
	header("Cache-Control: no-store, no-cache, must-revalidate");
	header("Pragma: no-cache"); 

$data = file_get_contents('./tb_settings.txt', true); 
$data=preg_split('/&/',$data);
$k=$data[8]/$data[1];
$find = array("\n\n", "\n\n\n", "\p\p", "\p\p\p", "\r\r", "\r\r\r", "<p>", "</p>");
$replace = array("", "", "", "", "", "", "", "");
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>NASTAVITVE - Trotl boben</title>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script>
$(document).ready(function() {
	$('#shrani').click(function() {	
		$.ajax({
			data: $("#nastavitve").serialize(),
			type: 'POST', // GET or POST
			url: './tb_settings_write.php', // the file to call
			//success: function(response) {$('#liresults').html(response);},
		});	return false;
	})
	$('#reset').click(function() {	
		$.ajax({
			data: {pisava:'Arial',velikost:'70',barva:'#000000',ozadje:'#ffffff',zrcaloY:'zrcaloY',zrcaloX:'',width:'1000',koeficient:'0.01',leading:'1.3' },
			type: 'POST', // GET or POST
			url: './tb_settings_write.php', // the file to call
			success: function(response) {$('body').html(response);},
		});	return false;
	})
	$('#Aminus').click(function() {	
		$("#besedilo").css('font-size', $("#besedilo").css('font-size').replace("px", "")-3+'px' );
	})
	$('#Anic').click(function() {	
		$("#besedilo").css('font-size', '15px' );
	})
	$('#Aplus').click(function() {	
		$("#besedilo").css('font-size', ($("#besedilo").css('font-size').replace("px", "")-(-3))+'px' );
	})

})
</script>
<style>
div,textarea,#Aminus,#Anic,#Aplus {
	font:15px Arial;
	padding:5px;
	color:black;
	text-decoration:none;
}
</style>
</head>
<body>
<div style="margin:0 auto;width:800px;">
<div style="float:left;">Besedilo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a name="Aminus" id="Aminus" href="#">A-</a>&nbsp;&nbsp;&nbsp;<a name="Anic" id="Anic" href="#">A</a>&nbsp;&nbsp;&nbsp;<a name="Aplus" id="Aplus" href="#">A+</a><br />
<form name="nastavitve" id="nastavitve">
    <textarea name="besedilo" id="besedilo" style="min-width:600px;height:400px;"><?php echo str_replace($find, $replace, trim(file_get_contents('./text.txt', true)));  ?></textarea>
</div>
<div style="background-color:white;width:150px;float:left;">
    <select name="pisava" id="pisava">
    	<option<?php if($data[0]=='Arial'){echo' selected';} ?>>Arial</option>
    	<option<?php if($data[0]=='Tahoma'){echo' selected';} ?>>Tahoma</option>
    	<option<?php if($data[0]=='Times New Roman'){echo' selected';} ?>>Times New Roman</option>
    	<option<?php if($data[0]=='Helvetica'){echo' selected';} ?>>Helvetica</option>
    </select><br />
   <input type="number" name="velikost" id="velikost" value="<?php echo $data[1]; ?>" /><br />
    razmik vrstic: <select name="leading" id="leading">
    	<option value="0.2"<?php if($k=='0.2'){echo' selected';} ?>>20 %</option>
    	<option value="0.4"<?php if($k=='0.4'){echo' selected';} ?>>40 %</option>
    	<option value="0.6"<?php if($k=='0.6'){echo' selected';} ?>>60 %</option>
    	<option value="0.7"<?php if($k=='0.7'){echo' selected';} ?>>70 %</option>
    	<option value="0.8"<?php if($k=='0.8'){echo' selected';} ?>>80 %</option>
    	<option value="0.9"<?php if($k=='0.9'){echo' selected';} ?>>90 %</option>
    	<option value="1"<?php if($k=='1'){echo' selected';} ?>>100 %</option>
    	<option value="1.1"<?php if($k=='1.1'){echo' selected';} ?>>110 %</option>
    	<option value="1.2"<?php if($k=='1.2'){echo' selected';} ?>>120 %</option>
    	<option value="1.3"<?php if($k=='1.3'){echo' selected';} ?>>130 %</option>
    	<option value="1.4"<?php if($k=='1.4'){echo' selected';} ?>>140 %</option>
    	<option value="1.5"<?php if($k=='1.5'){echo' selected';} ?>>150 %</option>
    	<option value="1.6"<?php if($k=='1.6'){echo' selected';} ?>>160 %</option>
    	<option value="1.8"<?php if($k=='1.8'){echo' selected';} ?>>180 %</option>
    	<option value="2"<?php if($k=='2'){echo' selected';} ?>>200 %</option>
    </select><br /><br />
    barva: <select name="barva" id="barva">
    	<option value="#000000"<?php if($data[2]=='#000000'){echo' selected';} ?>>black</option>
    	<option value="#ffffff"<?php if($data[2]=='#ffffff'){echo' selected';} ?>>white</option>
    	<option value="#666666"<?php if($data[2]=='#666666'){echo' selected';} ?>>grey</option>
    	<option value="#ff0000"<?php if($data[2]=='#ff0000'){echo' selected';} ?>>red</option>
    	<option value="#00ff00"<?php if($data[2]=='#00ff00'){echo' selected';} ?>>green</option>
    	<option value="#0000ff"<?php if($data[2]=='#0000ff'){echo' selected';} ?>>blue</option>
    	<option value="#00ffff"<?php if($data[2]=='#00ffff'){echo' selected';} ?>>cyan</option>
    	<option value="#ff00ff"<?php if($data[2]=='#ff00ff'){echo' selected';} ?>>magenta</option>
    	<option value="#ffff00"<?php if($data[2]=='#ffff00'){echo' selected';} ?>>yellow</option>
    </select><br />
    ozadje: <select name="ozadje" id="ozadje">
    	<option value="#ffffff"<?php if($data[3]=='#ffffff'){echo' selected';} ?>>white</option>
    	<option value="#000000"<?php if($data[3]=='#000000'){echo' selected';} ?>>black</option>
    	<option value="#ff0000"<?php if($data[3]=='#ff0000'){echo' selected';} ?>>red</option>
    	<option value="#00ff00"<?php if($data[3]=='#00ff00'){echo' selected';} ?>>green</option>
    	<option value="#0000ff"<?php if($data[3]=='#0000ff'){echo' selected';} ?>>blue</option>
    	<option value="#00ffff"<?php if($data[3]=='#00ffff'){echo' selected';} ?>>cyan</option>
    	<option value="#ff00ff"<?php if($data[3]=='#ff00ff'){echo' selected';} ?>>magenta</option>
    	<option value="#ffff00"<?php if($data[3]=='#ffff00'){echo' selected';} ?>>yellow</option>
    </select><br /><br />
    dimenzije: <input type="number" name="width" id="width" value="<?php echo str_replace('px','',$data[6]); ?>" maxlength="4" style="width:40px;" /> px
    <br /><br />
     koeficient <input type="number" name="koeficient" id="koeficient" value="<?php echo $data[7]; ?>" maxlength="5" style="width:40px;" /><br /><br />
    zrcalo (x-os): <input type="checkbox" name="zrcaloX" id="zrcaloX" value="zrcaloX"<?php if($data[4]<>''){echo' checked';} ?> /><br />
    zrcalo (y-os): <input type="checkbox" name="zrcaloY" id="zrcaloY" value="zrcaloY"<?php if($data[5]<>''){echo' checked';} ?> />
</form><br /><br /><br />
<button name="shrani" id="shrani">shrani</button><br /><br /><br /><br />
<button name="reset" id="reset">reset</button>
    </div></div>
</body>
</html>