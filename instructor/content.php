<?php
switch ($opt) {
	case "Mail":
		include 'mail.php';
		break;
	case "Calendar":
		include 'calendar.php';
		break;
	case "Subjects":
		include 'subjects.php';
		break;
	default:
		include 'options.php';
}
?>