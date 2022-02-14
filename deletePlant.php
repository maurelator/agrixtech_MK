<?php
include 'connect.php';

if (isset($_GET['deleteid'])) {
	$id = $_GET['deleteid'];

	$psql = "DELETE FROM \"MK\".\"Plant\" WHERE id = $id";
	$result = pg_query($con,$psql);
	if ($result) {
		header('location:index.php');
	}else{
		die(pg_result_error($con));
	}
	pg_close($con);
}

?>
