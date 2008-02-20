<?php include('parts/header.php') ?>
<h2>Executive</h2>
<?

	$members = array
	( 'Steven'   => array('Club President', '')
	, 'Lindsay' => array('VP Finance', '')
	, 'Sean'    => array('Alumni Advisor'
		, 'Sean has been juggling with the club for 15 years. '
		. 'He will happily show you some diabolo or cigar box '
		. 'tricks, if you are interested.')
	);

?>

<div id="Executive">
	<?  foreach ($members as $name => $info) { ?>
		<div class="Member">
		<? if (is_file('members/' . strtolower($name) . '.jpg')) { ?>
		<img src="members/<?= strtolower($name) ?>.jpg" alt="<?= $name ?>" />
		<? } ?>
		<h3><?= $name ?></h3>
		<h4><?= $info[0] ?></h4>
		<p><?= $info[1] ?></p>	
		</div>
	<? } ?>
</div>



<?php include('parts/footer.php') ?>
