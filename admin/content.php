<?php
switch ($opt) {
	case "Mail":
		include 'mail.php';
		break;
	case "Calendar":
		include 'calendar.php';
		break;
	case "Faculty":
		include 'faculty.php';
		break;
	case "Student":
		include 'student.php';
		break;
	case "Guest":
		include 'guest.php';
		break;
	case "Applications":
		echo "Applications-Content";
		break;
	case "Subjects":
		echo "Subjects-Content";
		break;
	case "Curriculum":
		echo "Curriculum-Content";
		break;
	case "Finance":
		echo "Finance-Content";
		break;
	default:
		include 'overview.php';
}
?>