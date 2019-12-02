<?php

include ('admin_session.php');
$uname =$_GET['id'];
$sql="DELETE FROM user_details WHERE username = '$uname'";
mysqli_query($conn,$sql);


header("location: viewmembers.php");


?>