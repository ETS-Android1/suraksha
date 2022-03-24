<?php

$res = "";
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];

#mysqli_connect(server address, username, password, database name)
$connection = mysqli_connect('localhost', 'root', 'root', 'suraksha');

if (!$connection)
{
	die("Error connecting");
}

else
{
	$query = "insert into users values(null, '$name', '$phone', '$email', '$password')";
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