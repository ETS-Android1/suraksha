<?php  

//Getting the values from the app
$phone = $_POST['phone'];
$password = $_POST['password'];
//$phone = '1234567890';
//$password = '123456';

$res = ""; $name=""; $email="";

//Establishing the connection
//mysqli_connect(ip address, username, password, database name);
$connection = mysqli_connect('localhost', 'root', 'root', 'suraksha');

if (!$connection)
{
	die("Could not connect to the database");
}
else
{
	$query = "select * from users where phone = '$phone' and password = '$password'";
	$result = mysqli_query($connection, $query);

	if ($result -> num_rows > 0)
	{
		$res = 'OK';
		$sql_arr = mysqli_fetch_array($result);
		
		$name = $sql_arr['name'];
		$email = $sql_arr['email'];
	}
	else
	{
		$res = 'EMPTY';
	}

	echo json_encode(array('res' => $res, 'name' => $name, 'email' => $email));
}

?>

