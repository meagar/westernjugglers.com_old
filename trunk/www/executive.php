<? function yield_body() { ?>

<h2>Executive</h2>
<?
$members = array
	( array('Steven', 'Club President', 'steve@com.com', '')
	, array('Lindsay', 'VP Finance', 'lindsay@com.com', '')
	, array('Sean', 'Alumni Advisor', 'sean@com.com', 'Sean has been juggling with the club for 15 years. He will happily show you some diabolo or cigar box tricks, if you are interested.')
	);

?>

<div id="Executive">
	<?  foreach ($members as $info) { ?>
		<div class="Member">
		<? if (is_file('members/' . strtolower($info[0]) . '.jpg')) { ?>
		<img src="members/<?= strtolower($info[0]) ?>.jpg" alt="<?= $info[0]?>" />
		<? } ?>
		<h3><?= $info[0]?></h3>
		<h4><?= $info[1] ?></h4>
		<p><?= $info[3] ?></p>	
		<p><a href="mailto:<?= $info[2] ?>"><?= $info[2] ?></a></p>	
		</div>
	<? } ?>
</div>

<? } include('parts/layout.php') ?>
