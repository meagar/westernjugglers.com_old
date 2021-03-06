<?php

function scale_image($src_file, $dest_file, $max_width, $max_height, $quality = 100) {
	// Load the file
	list ($width, $height) = getimagesize($src_file);
	
	$max_ratio = $max_width / $max_height;
	$ratio = $width / $height;

	if ($ratio > $max_ratio) {
		$dst_width  = $max_width;
		$dst_height = ($height / $width) * $max_width;
	} else {
		$dst_width  = ($width / $height) * $max_height;
		$dst_height = $max_height;

	}

	$src = imagecreatefromjpeg($src_file);

	$dst = imagecreatetruecolor($dst_width, $dst_height);

	imagecopyresampled($dst, $src, 0,0,0,0, $dst_width, $dst_height, $width, $height);
	
	// Write the thumbnail
	imagejpeg($dst, $dest_file, $quality);
}

class Image {
	public function __construct($file) {
		$this->name = basename($file);
		$this->file = $file;
		$extension = pathinfo($file);

		$thumb = 'thumbs/' . md5_file($file) . '.' . $extension['extension'];
		$thumb = strtolower($thumb);

		if (!is_file($thumb))
			scale_image($file, $thumb, 150, 130, 85);

		$this->thumb = $thumb;

	}

}

class Gallery {
	public function __construct($path) {
		$this->name = basename($path);
		$this->niceName = str_replace('_', ' ', $this->name);

		$this->images = array();	

		foreach (glob($path . '/*') as $file) {
			if (basename($file) == 'desc.txt') continue;
			array_push($this->images, new Image($file));
		}

		if (is_file($path . '/desc.txt'))
			$this->desc = file_get_contents($path . '/desc.txt');
		else
			$this->desc = '';

	}
}

function getGalleries() {

	$galleries = array();

	foreach (glob('gallery/*') as $dir) {
		if (is_dir($dir)) {
			array_push($galleries, new Gallery($dir));
		}
	}

	return $galleries;
}



?>
