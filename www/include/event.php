<?php

class Event {
	public function __construct($name, $date, $where, $website, $info) {
		$this->name    = $name;
		$this->date    = $date;
		$this->where   = $where;
		$this->website = $website;
		$this->info    = $info;
	}
}

include('data/events.php');
?>
