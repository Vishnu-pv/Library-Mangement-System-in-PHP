<?php

include ('admin_session.php');
$id = (int)$_GET['id'];

$sql="DELETE FROM book_details WHERE book_id = '$id'";

mysqli_query($conn,$sql);

header("location: viewbooks.php");


?>