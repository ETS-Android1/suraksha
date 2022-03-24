<?php

$res = "";
$pid = array();
$pname = array();
$pinfo = array();
$pprice = array();

$connection = mysqli_connect('localhost', 'root', 'root', 'suraksha');

if (!$connection)
{
	die("Could not connect to database");
}
else
{
	$query = "select * from products";
	$result = mysqli_query($connection, $query);

	if ($result -> num_rows > 0)
	{
		$res = "OK";

		while ($sql_arr = mysqli_fetch_array($result))
		{
			array_push($pid, $sql_arr['pid']);
			array_push($pname, $sql_arr['pname']);
			array_push($pprice, $sql_arr['pprice']);
			array_push($pinfo, $sql_arr['pinfo']);
		}
	}

	else
	{
		$res = "EMPTY";
	}

	echo json_encode(array('res' => $res, 'pid' => $pid, 'pname' => $pname, 'pprice' => $pprice, 
		'pinfo' => $pinfo));
}


?>
