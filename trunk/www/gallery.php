<? require_once('_include/gallery.php');

function drawThumbnail($image) {
	?><div class="Thumbnail"><a href="/<?= $image->file ?>"><img
		src="/<?= $image->thumb?>" alt=""  /></a></div><?

}

function showAllGalleries() {
	?>
	<h2>Gallery</h2>
	<p>
		Below are some photos of club meetings or events which club members have attended.
	</p>
	<?
	foreach (getGalleries() as $gallery) {
		$images = $gallery->images;
		$href="/gallery/?" . urlencode($gallery->name);
		?>
			<div class="GalleryBrief">
				<h3><a href="<?= $href?>"><?= $gallery->niceName ?>
				(<?= count($images) ?> images)</a></h3>
	
				<div class="Thumbnails">
					<?
					$max = (count($images) > 4 ? 4 : count($images));
					for ($i = 0; $i < $max; ++$i)
						drawThumbnail($images[$i]);
					?>
				</div>

				<!--<p><a href="<?=$href?>"><?= count($images) - $max ?> more images</a></p>-->
			</div>
		<?
	}
}

function showGallery($name) {
	foreach (getGalleries() as $gallery) {
		if ($gallery->name != $name)
			continue;
		?>

		<h2>Gallery - <?= str_replace('_', ' ', $gallery->name) ?></h3>
		<a href="gallery">Back</a><br/>

		<div class="Description"><?=h($gallery->desc)?></div>

		<?
		foreach ($gallery->images as $image)
			drawThumbnail($image);
		?>
			<a style="clear:both; display:block;" href="gallery">Back</a><br/>
		<?
	}
}


function yield_body() {

	# Parse our input param, if any
	if (count($_GET) == 1) {
		$keys = array_keys($_GET);
		$gallery = basename($keys[0]);
		if (!is_dir('_gallery/' . $gallery))
			unset($gallery);
	}

	?>

	<div class="Gallery">
	<?	
	if (isset($gallery))
		showGallery($gallery);
	else
		showAllGalleries();
	?>
	</div>
<? } include('_parts/layout.php') ?>
