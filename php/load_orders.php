<?php

$res = "";
$user = $_POST['user'];
$oid = array();
$items = array();
$amount = array();
$date = array();
$address = array();

$connection = mysqli_connect('localhost', 'root', 'root', 'suraksha');

if (!$connection)
{
    die("Error connecting");
}
else
{
    $query = "select * from orders where customer = '$user'";
    $result = $connection -> query($query);

    if ($result -> num_rows > 0)
    {
        $res = "OK";

        while ($arr = mysqli_fetch_array($result))
        {
            array_push($oid, $arr['oid']);
            array_push($items, $arr['items']);
            array_push($amount, $arr['amount']);
            array_push($date, $arr['date']);
            array_push($address, $arr['address']);
        }

    }
    else
    {
        $res = "EMPTY";
    }

    echo json_encode(array('res' => $res, 'oid' => $oid, 'items' => $items, 'amount' => $amount,
        'date' => $date, 'address' => $address));
}

?>