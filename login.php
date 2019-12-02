<?php
session_start(); // Starting Session
$role="";
if (isset($_POST)&& array_key_exists('submit',$_POST)) 
{

if (empty($_POST['username']) || empty($_POST['password'])|| empty($_POST['password'])) {
	
	echo '<script language="javascript">';
	echo 'alert("Invalid Username or Password")';
	echo '</script>';
}
else{
//Define $username and $password and usertype
$username = $_POST['username'];
$password = $_POST['password'];
$usertype = $_POST['usertype'];


// mysqli_connect() function opens a new connection to the MySQL server.

$conn = mysqli_connect("localhost", "root", "cetmca", "library_srv_3");

// SQL query to fetch information of registerd users and finds user match.
$query = "SELECT username,password,usertype from user_details where username='$username' AND password='$password' AND usertype='$usertype'";

$result=mysqli_query($conn,$query);
$count=mysqli_num_rows($result);
$rows=mysqli_fetch_assoc($result);

if($count>0)
{

$_SESSION['utype'] = $rows['usertype'];
$_SESSION['login_user'] = $rows['username'];
$role=$rows['usertype'];



}
else
{
	echo '<script language="javascript">';
	echo 'alert("Invalid Username or Password")';
	echo '</script>';

}


switch($role)
{
	case 'admin':
				header('location:admin.php');
				exit();
				break;
	case 'user':
				header('location:member.php');
				exit();
				break;


}


mysqli_close($conn); // Closing Connection

}
}
?>

