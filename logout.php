<?php
session_start();
session_unset();
header('Location: http://localhost:81/softeng/mypage.php');
exit();
?>