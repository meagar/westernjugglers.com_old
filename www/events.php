<?php

require_once('include/event.php');

function yield_body() { ?>

<h2>Events</h2>
<p>
	Juggling festivals are a great place to be inspired and astounded by truly
	great juggling.  There are usually one or more vendors of juggling equipment
	present, and crash-space can usually be arranged for multi-day festivals.

	Events are usually added to our <?= GOOGLE_CAL_LINK ?>.
</p>

<p>Some upcoming events and festivals within driving distance of London:</p>

<ul>
<? foreach (getEvents() as $e) { ?>
	<li class="Event">
		<h4><?=h($e->name)?></h4>
		<p class="Date"><?=h($e->date)?></p>
		<p class="Where"><?=h($e->where)?></p>
		<p class="Url"><a href="<?= $e->website ?>"><?=h($e->website)?></a></p>
		<p class="Info"><?= $e->info ?></p>
	</li>
<? } ?>
</ul>

<? } include('parts/layout.php') ?>
