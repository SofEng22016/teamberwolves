<?php 
date_default_timezone_set('Asia/Singapore');
echo mktime();
$dte = "";
echo "<br>".date("Y-m-d");
$dte = date("Y-m-d")." ".date("H:i:s");
echo "<br>".$dte;
echo "<br>";
$time = strtotime('2010-04-28 17:25:43');

echo 'event happened '.humanTiming($time).' ago'."<br>";
$time = strtotime('2016-03-01 17:25:43');

echo 'event happened '.humanTiming($time).' ago'."<br>";
$time = strtotime('2016-03-06 23:42:00');

echo 'event happened '.humanTiming($time).' ago'."<br>";
$time = strtotime('2010-04-28 17:25:43');

echo 'event happened '.humanTiming($time).' ago'."<br>";

function humanTiming ($time)
{

	$time = (mktime() - $time) + 3600; // to get the time since that moment
	$time = ($time<1)? 1 : $time;
	$tokens = array (
			31536000 => 'year',
			2592000 => 'month',
			604800 => 'week',
			86400 => 'day',
			3600 => 'hour',
			60 => 'minute',
			1 => 'second'
	);

	foreach ($tokens as $unit => $text) {
		if ($time < $unit) continue;
		$numberOfUnits = floor($time / $unit);
		return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
	}

}
?>