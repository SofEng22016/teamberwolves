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
	case "Announcement":
		include 'announcement.php';
		break;
	case "Resources":
		include 'resources.php';
		break;
	case "Schedule":
		include 'schedule.php';
		break;
	default:
		include 'options.php';
}
?>