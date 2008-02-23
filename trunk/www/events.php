<? require_once('include/event.php') ?>

<? function yield_body() { ?>

<h2>Events</h2>
<p>
Juggling festivals are a great place to be inspired and astounded by
truly great juggling.  There are usually one or more vendors of
juggling equipment present, and crash-space can usually be arranged for
multi-day festivals.
</p>

<p>Some upcoming events and festivals within driving distance of London:</p>

<ul>
<? foreach (getEvents() as $event) { ?>
	<li class="Event">
		<h4><?=h($event->name)?></h4>
		<p class="Date"><?=h($event->date)?></p>
		<p class="Where"><?=h($event->where)?></p>
		<p class="Url"><a href="<?= $event->website ?>"><?=h($event->website)?></a></p>
		<p class="Info"><?= $event->info ?></p>
	</li>
<? } ?>
</ul>

<? } include('parts/layout.php') ?>
