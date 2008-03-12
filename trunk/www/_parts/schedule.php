<?php
require_once('data/schedule.php');

function MeetingsByDate() {
	$dateList = array();

	foreach (getSchedule() as $location => $dates)
			foreach ($dates as $date)
				$dateList[strtotime($date . ' 21:00')] = $location;

	return $dateList;
}

function RenderNextMeeting() {
		
	$dateList = MeetingsByDate();
	$keys = array_keys($dateList);
	sort($keys);
	foreach ($keys as $date) {
		if ($date > time()) {
			?><div id="NextMeeting"><a href="meetings.php">Next meeting: <?= date('F d, Y', $date) ?> @ <?= $dateList[$date] ?></a></div><?
			return;
		}
	}
}

function MeetingTonight() {
	$tonight = date('M d, Y', time());

	foreach (array_keys(MeetingsByDate()) as $date)
		if (date('M d, Y', $date) == $tonight)
			return true;

	return false;
}

function RenderMeetingTable() {

	if (MeetingTonight())
		echo '<div class="MeetingTonight">Meeting tonight!</div>';

	$schedule = getSchedule();
?>
	<table class="Schedule">
		<? $dateList = array() ?>
		<tr><th colspan="2">2007 - 2008 Schedule</th></tr>
		<tr><th>Date</th><th>Location</th></tr>
		<?

		$dateList = MeetingsByDate();
	
		$keys = array_keys($dateList);
		sort($keys);
	
		$locations = array_keys($schedule);
		sort($locations);
		
		$class = 'Past';

		foreach ($keys as $date) {
			$location = $dateList[$date];
			$dateFmt = date('M d, Y', $date);

			if ($date >= time()) {
				if ($class == 'Past') {
					$class = 'Next';
					$dateFmt = '* ' . $dateFmt;
				} else {
					$class = 'Future';
				}
			}

			?>
			<tr class="<?= $class ?>">
				<th><?= $dateFmt ?></th>
				<td class="<?= strtolower(str_replace(' ', '-', $location)) ?>"><?=h($location)?></td>
			</tr>
			<?
		}	
		?>
		<tr><th style="font-size:smaller; padding:1px; text-align:center;" colspan="2">* Next Meeting</th></tr>
	</table>
<?
}

?>