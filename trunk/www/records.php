<? require_once('include/record.php'); ?>

<?function yield_body() { ?>

<div id="Records">
	<h2>Club Records</h2>

	<p>
	Our meetings used to be held in the gymnastics room on campus, and as such
	some of our records involved some rather strange gymnastics apparatus.  The
	records are not always up to date, as our record book goes missing and is
	refound on occasion.
	</p>
	<ul>
	<? foreach (getRecords() as $record) { ?>
	<li>
		<h4><?=h($record->what)?></h4>
		<p>
			<span class="Holder"><?=h($record->holder)?></span><br/>
			<span class="Record"><?=h($record->record)?></span>,
			<span class="Date"><?=h($record->date)?></span>
		</p>
	</li>
	<? } ?>
	</ul>
</div><!-- Records -->

<? } include('parts/layout.php') ?>
