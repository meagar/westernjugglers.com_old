<?php
require_once('data/schedule.php');

function MeetingsByDate() {
	$dateList = array();

	foreach (getSchedule() as $location => $dates)
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
	$schedule = getSchedule();
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
