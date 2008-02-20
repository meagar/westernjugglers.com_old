<? function yield_body() { ?>
<p>
	Individual members can be contacted on the <?= to_members('members page') ?>,
	TODO if they've made their contact info publicly visible.
</p>

<p>
	The club itself can be contacted in a number of ways:

	<h3>Email</h3>
	<a href="mailto:juggling@todo.ca">juggling@todo.ca</a>

	<h3>Facebook</h3>
	Feel free to join the <a href="http://www.facebook.com/group.php?gid=2536821735">Western Juggling Club</a> group

	<h3>In Person</h3>
	By coming to one of our <a href="meetings.php">meetings</a>.

</p>

<? } include('parts/layout.php') ?>
