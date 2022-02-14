<?php

$host='ec2-34-206-148-196.compute-1.amazonaws.com';
$user='hoqpbchfbscqma';
$pwd='f626de7c47772920114a99b32e40c8c5641bc9b0ce40f9640b42e01b712437f5';
$db='dbkiju5113kh5n';
$con=pg_connect("host=$host dbname=$db user=$user password=$pwd ") or die("Could not connect to server\n");

if (!$con) {
    echo "Error: Unable to connect to Agrix";
}



?>