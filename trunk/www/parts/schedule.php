<?php
require_once('data/schedule.php');

function MeetingsByDate() {
	global $schedule;
	$dateList = array();

	foreach ($schedule as $location => $dates)
			foreach ($dates as $date)
				$dateList[strtotime($date)] = $location;

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

function RenderMeetingTable() {
	global $schedule;
?>
	<table class="Schedule">
		<? $dateList = array() ?>
		<tr><th style="text-align:center; font-weight:bold" colspan="2">2007 - 2008 Schedule</th></tr>
		<tr><th style="text-align:center; font-weight:bold; border:none;">Date</th><th style="text-align:center; font-weight:bold; border:none;">Location</th></tr>
		<?

		$dateList = MeetingsByDate();
	
		$keys = array_keys($dateList);
		sort($keys);
	
		$locations = array_keys($schedule);
		sort($locations);

		foreach ($keys as $date) {
			$location = $dateList[$date];
			$locClass = 'loc-' . array_search($location, $locations);
			$dateFmt = date('M d, Y', $date);

			$class = 'Past';
			if ($date >= time()) {
				if ($nextDate == '') {
					$class = 'Next';
					$dateFmt = '* ' . $dateFmt;
					$nextDate = date('F d, Y', $date);
					$nextLocation = $loc;
				} else {
					$class = 'Future';
				}
			}

			?>
			<tr class="<?= $class ?>">
				<th><?= $dateFmt ?></th>
				<td class="<?= $locClass ?>"><?=h($location)?></td>
			</tr>
			<?
		}	
		?>
		<tr><th style="font-size:smaller; padding:1px; text-align:center;" colspan="2">* Next Meeting</th></tr>
	</table>
<?
}

?>
