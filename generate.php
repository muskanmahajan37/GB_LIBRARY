<?php
header('Content-Type: image/jpeg');
mysql_connect('loaclhost','root','');
mysql_select_db('a_database');
if(isset($_GET['$id'])){
	$id=$_GET['$id'];
	$query=("SELECT 'email' FROM 'users' WHERE 'id'='".mysql_real_escape_string($id)."'");
	if(mysql_num_rows($query)>=1){
		$email=mysql_result($query, 0,'email')
	}
	else{
		$email='coudnt find id';
	}
}
else{
	$email='coudnt get the id';
}


$email_lenth=strlen($email);
$font=4;
$image_height = imagefontheight($font);
$image_width = imagefontwidth($font) * $email_lenth;
 
$image=imagecreate($image_width,$image_height);
$backgroud=imagecolorallocate($image, 0, 0, 0);
$foreground=imagecolorallocate($image, 255, 255, 255);
imagestring($image, $font, 0, 0, $email, $foreground);
imagejpeg($image);
?>