<?php
switch ($opt) {
	case "Mail":
		include 'mail.php';
		break;
	case "Enrollment":
		include 'enrollment.php';
		break;
	case "Calendar":
		include 'calendar.php';
		break;
	case "Grades":
		include 'grades.php';
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
		include 'finance.php';
		break;
	case "Schedule":
		include 'schedule.php';
		break;
	case "Profile":
		include 'profile.php';
		break;
	default:
		include 'options.php';
}
?>