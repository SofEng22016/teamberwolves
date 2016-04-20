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
		include 'subjects.php';
		break;
	case "Curriculum":
		include 'curriculum.php';
		break;
	case "Finance":
		include 'finance.php';
		break;
	default:
		include 'options.php';
}
?>