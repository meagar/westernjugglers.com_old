<? function yield_body() { ?>

<h2>Executive</h2>
<?
$members = array
	//      Name        Position           Bio
	( array('Steven'  , 'Club President' , '')
	, array('Lindsay' , 'VP Finance'     , '')
	, array('Sean'    , 'Alumni Advisor' , 'Sean has been juggling with the club for 15 years. He will happily show you some diabolo or cigar box tricks, if you are interested.')
	);

?>

<div id="Executive">
	<? foreach ($members as $info) {
		$file = '_gfx/members/' . strtolower($info[0]) . '.jpg';	?>
		<div class="Member">
			<? if (is_file($file)) { ?><img src="/<?= $file ?>" alt="<?=h($info[0])?>" /><? } ?>
			<h3><?= h($info[0]) ?></h3>
			<h4><?= h($info[1]) ?></h4>
			<p><?=  h($info[2]) ?></p>	
		</div>
	<? } ?>
</div>

<? } include('_parts/layout.php') ?>

