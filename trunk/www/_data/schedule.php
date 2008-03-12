<?  function getSchedule() {

	# map of locations to an array of dates
	# Dates should be parsable by date() ie, (Month DD, YYYY)
	return array
	( 'Alumni Hall' => array
		( 'September 23, 2007'
		, 'September 30, 2007'
		, 'October 28, 2007'
		, 'November 11, 2007'
		, 'January 13, 2008'
		, 'January 27, 2008'
		, 'February 10, 2008'
		, 'March 16, 2008'
		, 'March 30, 2008'
		, 'April 6, 2008'	)
	, 'UCC Atrium' => array
		( 'October 15, 2007'
		, 'October 22, 2007'
		, 'November 5, 2007'
		, 'November 19, 2007'
		, 'November 26, 2007'
		, 'December 3, 2007'
		, 'January 7, 2008'
		, 'January 21, 2008'
		, 'February 4, 2008'
		, 'February 18, 2008'
		, 'March 3, 2008'
		, 'March 10, 2008'
		, 'March 24, 2008')
	);
}
?>
