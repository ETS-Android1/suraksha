<?php

$res = "";
$name = $_POST['name'];
$culprit = $_POST['culprit'];
$details = $_POST['details'];
$date = $_POST['date'];

$connection = mysqli_connect('localhost', 'root', 'root', 'suraksha');

if (!$connection)
{
	die("Error connecting");
}

else
{
	$query = "insert into reports values(null, '$name', '$culprit', '$details', '$date')";
	$result = mysqli_query($connection, $query);

	if ($result)
	{
		$res = "OK";
	}
	else
	{
		$res = "ERROR";
	}

	echo json_encode(array('res'=>$res));

}

?>