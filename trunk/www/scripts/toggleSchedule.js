
function toggleSchedule() {
	
	e = document.getElementById("Schedule");

	// Find all the rows with the class "Past"
	rows = e.getElementsByTagName('tr');

	var visible = false;
	for (var i = 0; i < rows.length; ++i) {
		if (rows[i].className == 'Past') {
			if (rows[i].style.display == 'none') {
				visible = true;
				rows[i].style.display = 'table-row';
			} else {
				visible = false;
				rows[i].style.display = 'none';
			}
		} else if (rows[i].className == 'Hide' && visible) {
			rows[i].style.display = 'none';
		}
	}

	return false;
}

