<?php

require_once('include/link.php');

function yield_body() { ?>

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

<? } include('parts/layout.php') ?>
