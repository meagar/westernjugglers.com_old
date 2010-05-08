<?php

function scale_image($src_file, $dest_file, $max_size, $quality = 100) {
	// Load the file
	list ($width, $height) = getimagesize($src_file);

	if ($width > $height) {
		$dst_width  = $max_size;
		$dst_height = ($height / $width) * $max_size;
	} else {
		$dst_width  = ($width / $height) * $max_size;
		$dst_height = $max_size;
	}

	$src = imagecreatefromjpeg($src_file);

	$dst = imagecreatetruecolor($dst_width, $dst_height);

	imagecopyresampled($dst, $src, 0,0,0,0, $dst_width, $dst_height, $width, $height);
	
	// Write the thumbnail
	imagejpeg($dst, $dest_file, $quality);

	return $thumb;
}

function get_thumb($pic) {
	$thumb = 'thumbs/' . basename($pic);

	if (!is_file($thumb))
		scale_image($pic, $thumb, 200, 80);

	return $thumb;
}

function get_small($pic) {
	$small = 'small/' . basename($pic);

	if (!is_file($small))
		scale_image($pic, $small, 1000, 80);

	return $small;
}

function file_size($file) {
	$size = filesize($file);

	$units = array('B', 'kB', 'MB');
	$unit = 0;

	while ($size > 1000) {
		++$unit;
		$size /= 1000;
	}

	return (string)(round($size, 2)) . $units[$unit];
}

function get_pics($dir) {
}

function open_doc($title) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<style type="text/css">

img {
	border:none;
	margin:5px;
}

span.strike {
	text-decoration:line-through;
	color:#aaa;
}

div.Photo {
	display:table-cell;
	float:left;
	min-width:250px;
	min-height:300px;
	padding:10px;
	text-align:center;
}

a {
	text-decoration:none;
}

</style>
<title><?php echo $title ?></title>
</head>
<body>
<div>
<h3><?php echo $title ?></h3>
(A thumbnailing PHP gallery in <span class="strike">15</span> 30 minutes or less by <a href="http://www.meagar.net">Matthew Eagar</a>.)
<br />
<br /><br /><?
}

function show_pics($f) {
	$files = glob($f);
	foreach ($files as $file) {
		$thumb = get_thumb($file);
		$small = get_small($file);

		echo '<div class="Photo">', basename($file), '<br /><a href="', $small, '"><img src="'
			, $thumb, '" alt="', basename($file), '" /><br/>Small - '
			, file_size($small), '<br /></a><a href="', $file, '">Large - '
			, file_size($file), '</a>'
			, '</div>';
	}
}

function close_doc() {
?></div>
</body>
</html>
<?
}


?>


