<?php
include ('admin_session.php');

$id =$_GET['id'];
$bid=$_GET['bid'];

$qy="UPDATE book_details SET copies=copies+1 where book_id=$bid";
$conn->query($qy);

$sql="DELETE FROM issue_details WHERE issue_id = '$id'";

$conn->query($sql);



header("location: issuedetails.php");

?>