<?php

$res = "";
$customer = $_POST['customer'];
$items = $_POST['items'];
$amount = (int)$_POST['amount'];
$date = $_POST['date'];
$address = $_POST['address'];

$connection = mysqli_connect('localhost', 'root', 'root', 'suraksha');

if (!$connection)
{
	die("Error connecting");
}

else
{
    $query = "insert into orders values(null, '$customer', '$items', $amount, '$date', '$address')";
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