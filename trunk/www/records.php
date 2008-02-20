<? function yield_body() { ?>

<? include('data/records.php'); ?>

<div id="Records">
	<h2>Club Records</h2>

	<p>
	Our meetings used to be held in the gymnastics room on campus, and as such
	some of our records involved some rather strange gymnastics apparatus.  The
	records are not always up to date, as our record book goes missing and is
	refound on occasion.
	</p>
	<ul>
	<? foreach ($records as $record) { ?>
	<li>
		<h4><?=h($record[0])?></h4>
		<p>
			<span class="Holder"><?=h($record[2])?></span><br/>
			<span class="Record"><?=h($record[1])?></span>,
			<span class="Date"><?=h($record[3])?></span>
		</p>
	</li>
	<? } ?>
	</ul>
</div><!-- Records -->

<? } include('parts/layout.php') ?>
