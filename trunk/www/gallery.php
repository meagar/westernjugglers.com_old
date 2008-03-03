<? require_once('include/gallery.php');

function drawThumbnail($image) {
	?><div class="Thumbnail"><a href="<?= $image->file ?>"><img
		src="<?= $image->thumb?>" alt=""  /></a></div><?

}

function showAllGalleries() {

	foreach (getGalleries() as $gallery) {
		$images = $gallery->images;
		$href="gallery.php?gallery=" . urlencode($gallery->name);
		?>
			<div class="GalleryBrief">
				<h3><a href="<?= $href?>"><?= $gallery->niceName ?></a></h3>
	
				<div class="Thumbnails">
				<?
					$max = (count($images) > 4 ? 4 : count($images));
					for ($i = 0; $i < $max; ++$i)
						drawThumbnail($images[$i]);
				?>
				<p><a href="<?=$href?>"><?= count($images) - $max ?> more images</a></p>
				</div>
			</div>
		<?
	}
}

function showGallery($name) {
	foreach (getGalleries() as $gallery) {
		if ($gallery->name != $name)
			continue;
		?>

		<h3><?= str_replace('_', ' ', $gallery->name) ?></h3>
		<a href="gallery.php">Back</a><br/>

		<div class="Description"><?=h($gallery->desc)?></div>

		<?
		foreach ($gallery->images as $image)
			drawThumbnail($image);
		?>
			<a style="clear:both; display:block;" href="gallery.php">Back</a><br/>
		<?
	}
}


function yield_body() {

	# Parse our input param, if any
	if (array_key_exists('gallery', $_GET)) {
		$gallery = basename($_GET['gallery']);
		if (!is_dir('gallery/' . $gallery))
			unset($gallery);
	}

	?>
	<h2>Gallery</h2>
	<div class="Gallery">
	<?	
	if (isset($gallery))
		showGallery($gallery);
	else
		showAllGalleries();
	?>
	</div>
<? } include('parts/layout.php') ?>
