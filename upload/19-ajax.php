<!DOCTYPE html>
<html>
<head>
<title>Submit Form Without Refreshing Page</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<link href="css/refreshform.css" rel="stylesheet">
<script src="js/submit.js"></script>
</head>
<body>
<div id="mainform">
<h2>Submit Form Without Refreshing Page</h2>
<!-- Required Div Starts Here -->
<form id="form" name="form">
<h3>Fill Your Information!</h3>
<font color="red" id="NotFound" style="display: none">User Does Not Exist</font>
<font color="red" id="Incorrect" style="display: none">Incorrect</font>
<label>Name:</label>
<input id="user" placeholder="Your Name" type="text">
<label>Email:</label>
<input id="pass" placeholder="Your Email" type="text">
<input id="submit" type="button" value="Submit">
</form>
</div>
</body>
</html>
