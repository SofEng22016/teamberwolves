<?php
session_start();
$_SESSION['expire'] = time() + 30;
?>