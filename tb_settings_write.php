<?php
if (is_numeric ($_POST['velikost'])) { $velikost=trim($_POST['velikost']); } else { $velikost='70'; }
if (is_numeric ($_POST['width'])) { $width=trim($_POST['width']).'px'; } else { $width='100%'; }
if (is_numeric ($_POST['koeficient'])) { $koeficient=trim($_POST['koeficient']); } else { $koeficient='0.01'; }
if ($_POST['zrcaloX']=='zrcaloX'){$zrcaloX="transform: rotate(180deg);
-ms-transform: rotate(180deg);
-webkit-transform: rotate(180deg);";}
if ($_POST['zrcaloY']=='zrcaloY'){$zrcaloY="
        -moz-transform: scaleY(-1);
        -o-transform: scaleY(-1);
        -webkit-transform: scaleY(-1);
        transform: scaleY(-1);
        filter: FlipH;";}
	file_put_contents("tb_settings.txt", $_POST['pisava']."&".$velikost."&".$_POST['barva']."&".$_POST['ozadje']."&".$zrcaloX."&".$zrcaloY."&".$width."&".$koeficient."&".($_POST['leading']*$velikost).'px'
	);

$besedilo= trim($_POST['besedilo']);
/*$find = array("\n\n", "\n\n\n", "\p\p", "\p\p\p", "\r\r", "\r\r\r", '<p></p><p></p>');
$replace = array("", "", "", "", "", "", "");
$besedilo= str_replace($find, $replace, $_POST['besedilo']);
$besedilo= str_replace("\n", "</p><p>", $_POST['besedilo']);*/
$find = array("\n");
$replace = array("</p><p>");
$besedilo= str_replace($find, $replace, $_POST['besedilo']);

if($besedilo<>''){file_put_contents("text.txt", "<p>".$besedilo."</p>");}

echo '<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>
<div style="text-align:center;"><a style="color:red;font:bold 25px arial;margin:200px;text-decoration:none;" href="./tb_settings_gui.php" target="_self">osveži</a></div></p>';
?>