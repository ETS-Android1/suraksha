<?php

$res = "";
$number = $_POST['number'];
$location = $_POST['location'];
$date = $_POST['date'];

$connection = mysqli_connect('localhost', 'root', 'root', 'suraksha');

if (!$connection)
{
	die("Error connecting");
}

else
{
	$query = "insert into alerts values(null, $number, '$location', '$date')";
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