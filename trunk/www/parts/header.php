<?php
include_once('parts/schedule.php');

$TocItems = array
	( 'Home' => 'home.php'
	, 'Meetings' => 'meetings.php'
	, 'Executive' => 'executive.php'
#	, 'Maps' => 'maps.php'
	, 'Gallery' => 'gallery.php'
	, 'Club Records' => 'records.php'
	, 'Contact' => 'contact.php'
	, 'Links' => 'links.php'
	);

$flash = @file_get_contents('data/flash');

if ($flash != "")
	$flash = '<div id="FlashBox">' . $flash . '</div>';

?>
<html>
<head>
	<title>UWO Juggling Club</title>
	<link rel="stylesheet" type="text/css" href="css/standard.css" />	
</head>

<body>
	<div id="Wrapper">
		<div id="Content">

			<div id="Header">
				<h1><a href="home.php"><span>The University of Western Ontario Juggling Club</span></a></h1>

				<div id="Toc">
					<ul>
						<? foreach ($TocItems as $label => $page) { ?>
							<? if (basename($_SERVER['SCRIPT_FILENAME']) == $page) {?>
								<li class="Active"><a href="<?= $page ?>"><span><?= $label ?></span></a></li>
							<? } else {?>
								<li><a href="<?= $page ?>"><span><?= $label ?></span></a></li>
							<? } ?>
						<? } ?>
					</ul>
				</div>
			</div>

			<div id="Body">
				<div id="SideBar">
					<? RenderMeetingTable() ?>
				</div>

				<div id="BodyContent">
					<?= $flash ?>

<?

function home_link($label) {
	return '<a href="home.php">' . $label . '</a>';
}

function meetings_link($label) {
	return '<a href="meetings.php">' . $label . '</a>';
}

function members_link($label) {
	return '<a href="members.php">' . $label . '</a>';
}

?>
