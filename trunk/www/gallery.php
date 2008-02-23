<? require_once('include/gallery.php');

function drawThumbnail($image) {
	?><div class="Thumbnail"><a href="<?= $image->file ?>"><img
			src="<?= $image->thumb?>" alt="" /><br/><?=h($image->name)?></a></div><?

}

function showAllGalleries() {

	foreach (getGalleries() as $gallery) {
		$images = $gallery->images;
		?>
			<div class="GalleryBrief">
				<h3><a href="gallery.php?gallery=<?= urlencode($gallery->name) ?>"
					><?= str_replace('_', ' ', $gallery->name) ?> (<?= count($images) ?> Images)</a></h3>
	
				<div class="Thumbnails">
				<?
					$max = (count($images) > 4 ? 4 : count($images));
					for ($i = 0; $i < $max; ++$i)
						drawThumbnail($images[$i]);
				?>	
				</div>
			</div>
		<?
	}
}

function showGallery($name) {
	foreach (getGalleries() as $gallery) {
		if ($gallery->name != $name)
			continue;
		?><h3><?= str_replace('_', ' ', $gallery->name) ?></h3><?

		?><div class="Description"><?=h($gallery->desc)?></div><?
		foreach ($gallery->images as $image)
			drawThumbnail($image);
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
