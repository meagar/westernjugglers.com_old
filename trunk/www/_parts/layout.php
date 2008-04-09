<?php

include_once('_parts/schedule.php');

define('GOOGLE_CALENDAR_URL', 'http://www.google.com/calendar/embed?src=4l2em5a68d2m7uijpjnc1qbtbo%40group.calendar.google.com&amp;ctz=America/New_York');
define('GOOGLE_CAL_LINK', '<a href="http://www.google.com/calendar/embed?src=4l2em5a68d2m7uijpjnc1qbtbo%40group.calendar.google.com&amp;ctz=America/New_York">Google Calendar</a>');

$TocItems = array
	( 'Home' => 'home'
	, 'Meetings' => 'meetings'
	, 'Executive' => 'executive'
#	, 'Maps' => 'maps.php'
	, 'Gallery' => 'gallery'
	, 'Events' => 'events'
	, 'Club Records' => 'records'
	, 'Contact' => 'contact'
	, 'Links' => 'links'
	);

$flash = @file_get_contents('_data/flash');

if ($flash != "")
	$flash = '<div id="FlashBox">' . $flash . '</div>';

?>
<!-- Site Design and Layout by Matthew Eagar -->
<!-- www.meagar.net                          -->
<!-- meagar@gmail.com                        -->
<!-- Feb 2008                                -->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
	 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>UWO Juggling Club</title>
	<link rel="stylesheet" type="text/css" href="/_css/standard.css" />
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<meta name="keywords" content="juggle, juggling, jugglers, juggling club, western jugglers, western juggling club, university of western ontario, uwo juggling club, uiniversity of western ontario juggling club, balls, clubs, rings, diabolo, cigar boxes" />
	<meta name="description" content="The University of Western Ontario Juggling Club" />
	<meta name="author" content="Matthew Eagar" />
</head>

<body>
	<div id="Wrapper">
		<div id="Header">
			<h1><a href="/home"><span>The University of Western Ontario Juggling Club</span></a></h1>

			<div id="Toc">
				<ul><?
					foreach ($TocItems as $label => $page) {
						if (str_replace('.php', '', basename($_SERVER['SCRIPT_FILENAME'])) == $page) {
							?><li class="Active"><a href="/<?= $page ?>"><span><?= $label ?></span></a></li><?
						} else {
							?><li><a href="/<?= $page ?>"><span><?= $label ?></span></a></li><?
						}
					}
				?></ul>
			</div>
		</div>

		<div id="Body">

			<div id="BodyContent">
				<?= $flash ?>
				<? yield_body() ?>
				<div style="clear:both;"></div>
			</div><!-- BodyContent -->

			<div id="SideBar">
				<p class="FlashBox">See <a href="/meetings">Meetings</a> for our summer schedule.</p>
				<? RenderMeetingTable() ?>
				<?= GOOGLE_CAL_LINK ?>
			</div><!-- SideBar -->

		</div><!-- Body -->

		<div id="Push"></div>
	</div><!-- Wrapper -->

	<div id="Footer">
		<span>&copy; 2008 UWO Juggling Club</span>
		<p><!-- W3C Validation Icons -->
			<a href="http://validator.w3.org/check?uri=referer"><img
        src="http://www.w3.org/Icons/valid-xhtml10"
				alt="Valid XHTML 1.0 Strict" /></a>

			<a href="http://jigsaw.w3.org/css-validator/check/referer"><img
				src="http://jigsaw.w3.org/css-validator/images/vcss" 
				alt="Valid CSS!" /></a> 
		</p>
	</div>

</body>
</html>
<?

function link_($href, $label) {
	return '<a href="' . $href . '">' . $label . '</a>';
}

function to_home($label) { return link_('home', $label); }

function to_meetings($label) { return link_('meetings', $label); }

function to_members($label) { return link_('executive', $label); }

function h($message) { return htmlspecialchars($message); }

?>
