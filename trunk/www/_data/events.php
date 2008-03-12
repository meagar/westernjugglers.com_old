<? function getEvents() {

return  array 
	# new Event(name, date, location, url, notes)
	( new Event
		( ' Waterloo Juggling Festival'
		, 'March 15 & 16, 2008'
		, 'University of Waterloo, Waterloo Ontario'
		, 'http://www.math.uwaterloo.ca/~jjwest/UWFest08.htm'
		, 'About a 1.5 hour drive.  Matt will be attending for at least the 16th (Sat) and will have free space in his car.  <a href="http://www.higginsbrothers.com/">Higgins Brothers</a> will be there.'
		)
	, new Event
	  ( 'RIT Spring Juggle-In'
		, 'April 18 - 20 2008'
		, 'Rochester Institute of Technology, Rochester, New York'
		, 'http://www.rit.edu/~jugwww/'
		, 'Between 4 and 5 hours away, Matt will probably go, and will probably have car-space.'
		)
	, new Event
		( 'Montreal Juggling Festival'
		, 'May 02 - 04, 2008'
		, 'Ecole Lucien Pagé, Montreal, Quebec, Canada'
		, 'http://jaq.qc.ca/English/index_en.asp'
		, 'Roughly 7 hours drive.'
		)
	);

}?>
