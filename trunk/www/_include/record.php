<?php

class Record {

	public function __construct
	($what, $record, $holder, $date) {
		$this->what = $what;
		$this->record = $record;
		$this->holder = $holder;
		$this->date = $date;
	}
};

include('data/records.php');

?>
