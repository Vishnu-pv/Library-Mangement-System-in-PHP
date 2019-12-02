<?php

if(isset($_SESSION['utype']) && $_SESSION['utype']!='admin')
{
    header("location:logout.php");
    exit();
}
$conn = mysqli_connect("localhost", "root", "cetmca", "library_srv_3");

// Storing Session
$user_check = $_SESSION['login_user'];
$utype =$_SESSION['utype'];
// SQL Query To Fetch Complete Information Of User
$query = "SELECT username from user_details where username ='$user_check'";

$ses_sql = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($ses_sql);
$login_session = $row['username'];

?>
