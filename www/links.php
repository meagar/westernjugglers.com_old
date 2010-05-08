<? function yield_body() { ?>
<? require_once('_include/link.php') ?>

<div id="Links">

<h2>Links</h2>

<ul>
<? foreach (getLinks() as $cat => $links) { ?>
	<li class="Category">
		<h3><?=h($cat)?></h3>
		<ul>
			<? foreach ($links as $link) { ?>
				<li class="Link">
					<a href="<?= $link->url ?>"><?=h($link->label)?></a>
				</li>
			<? } ?>
		</ul>
	</li>
<? } ?>
</ul>

</div>

<? } include('_parts/layout.php') ?>
