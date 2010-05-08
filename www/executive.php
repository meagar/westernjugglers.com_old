<? function yield_body() { ?>

<h2>Executive</h2>
<?
$members = array
	//      Name        Position           Bio
	( array('Keith'   , 'Club President' , '')
	, array('Steven'  , 'VP Finance'     , '')
	, array('Sean'    , 'Alumni Advisor' 
	, 'Sean has been juggling with the club for 15 years. He will happily show 
		you some diabolo or cigar box tricks, if you are interested.')
	);

?>

<div id="Executive">
	<? foreach ($members as $m) {
		$file = 'gfx/members/' . strtolower($m[0]) . '.jpg';	?>
		<div class="Member">
			<? if (is_file($file)) { ?>
				<img src="/<?= $file ?>" alt="<?=h($m[0])?>" />
			<? } ?>
			<h3><?= h($m[0]) ?></h3>
			<h4><?= h($m[1]) ?></h4>
			<p><?=  h($m[2]) ?></p>	
		</div>
	<? } ?>
</div><!-- #executive -->

<? } include('parts/layout.php'); ?>

