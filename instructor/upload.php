<?php

$pid = empty($_POST['ID']) ? '' : $_POST['ID'];
$nme = empty($_POST['nme']) ? '' : $_POST['nme'];
if (empty($_FILES['files'.$nme])) {
    echo json_encode(['error'=>'No files found for upload.']); 
    // or you can throw an exception 
    return; // terminate
}
// get the files posted
$files = $_FILES['files'.$nme];

// get user id posted
$sec = empty($_POST['section']) ? '' : $_POST['section'];

// get user name posted
$cde = empty($_POST['code']) ? '' : $_POST['code'];

// a flag to see if everything is ok
$success = null;

// file paths to store
$paths = [];

// get file names
$filenames = $files['name'];

// loop and process files
$con = mysql_connect("localhost", "root", "");
if(! $con )
{
	die('Could not connect: ' . mysql_error());
}
$db = mysql_select_db("enrollment", $con);
$query = "SELECT * FROM `resources` WHERE `Section` = '$sec' AND `Code` = '$cde'";
$result = mysql_query($query,$con);
$rows = mysql_num_rows($result);
$count = 0;
$addExt = "";
$id = 0;
if($rows!=0){
while ($row = mysql_fetch_assoc($result)) {
	$count = $row['FileCount'];
	$id = $row['ID'];
	$addExt = $row['Files'];
}
}
$newCount = 0;
$isNew = 0;
$newExt = "";
for($i=0; $i < count($filenames); $i++){
	$newCount++;
    $ext = explode('.', basename($filenames[$i]));
    $num = $count+$i;
    $target = "../resources/$pid/$cde-$sec/" . $num . "." . array_pop($ext);
	$addExt .= strtolower(end(explode('.',$files['name'][$i]))).",";
	$newExt .= strtolower(end(explode('.',$files['name'][$i])));
	$newExt .= ',';
	if(!file_exists("../resources/$pid/$cde-$sec")){
		mkdir("../resources/$pid/$cde-$sec", 0777, true);
		$isNew++;
	}
    if(move_uploaded_file($files['tmp_name'][$i], $target)) {
        $success = true;
        $paths[] = $target;
    } else {
        $success = false;
        break;
    }
}
if($isNew==0){
	$newCount += $count;
}

// check and process based on successful status 
if ($success === true) {
	$con = mysql_connect("localhost", "root", "");
	if(! $con )
	{
		die('Could not connect: ' . mysql_error());
	}
	$db = mysql_select_db("enrollment", $con);
	if($isNew==0){
    	$query2 = "UPDATE `resources` SET `Files` = '$addExt', `FileCount` = '$newCount' WHERE `resources`.`ID` = '$id';";
	
  	  	$output = "Data Saved as Old";
	}
	else{
		$query2 = "INSERT INTO `resources` (`ID`, `ProfID`, `Section`, `Code`, `Files`, `FileCount`) 
				VALUES (NULL, '$pid', '$sec', '$cde', '$newExt', '$newCount');";
		$output = "Data Saved as New";
	}
	$result= mysql_query($query2,$con);

    // store a successful response (default at least an empty array). You
    // could return any additional response info you need to the plugin for
    // advanced implementations.
 
    // for example you can get the list of files uploaded this way
    // $output = ['uploaded' => $paths];
} elseif ($success === false) {
    $output = ['error'=>'Error while uploading images. Contact the system administrator'];
    // delete any uploaded files
    foreach ($paths as $file) {
        unlink($file);
    }
} else {
    $output = ['error'=>'No files were processed.'];
}

// return a json encoded response for plugin to process successfully
echo json_encode($output);
?>