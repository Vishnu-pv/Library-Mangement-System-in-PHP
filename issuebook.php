<?php
session_start();
include('admin_session.php');
$type=$_SESSION['utype'];
?>
<html>
<head>
 <title>Admin - Library Management System</title>    
    
    <link rel="stylesheet" type="text/css" href="./css/admin.css">
    <script language = "javascript">
		function DateCheck(){
            var idate=document.getElementById('issdate').value;
            var rdate=document.getElementById('retdate').value;
            if(idate>=rdate)
            {
                alert("Invalid Issue or Return date");
                return false;
            }
            else
                return true;
        }
	</script>
    
</head>
<body>
        <?php if($type == "admin") {?>
    <header>
              
        <div class="header-left">
            <h1 class="logo-text"><span style="color: red">ABC Library</span></h1>
        </div>
        
        <div class="header-right">
         
		<div class="side-top">   
                <div> <p>Welcome, <?php echo $_SESSION['login_user']; ?></p></div>
                <div><a href="logout.php">Log Out</a></div>
            </div>

        </div>
             
    </header>
    
    <!-- Admin Wrapper -->
    <div class="admin-wrapper">
    
    <!-- Left Sidebar -->
    <div class="left-tab">
         <ul>
            <li><a href="admin.php">Dashboard</a></li>
            <li><a href="viewbooks.php">Manage Books</a></li>
            <li><a href="viewmembers.php">Manage Members</a></li>
            <li><a href="addbooks.php">Add Books</a></li> 
            <li><a href="addmember.php">Add Members</a></li>
            <li><a href="issuebook.php">Issue Books</a></li>
             <li><a href="issuedetails.php">Issue Details</a></li>
        </ul>
    </div>
    
    
    <!-- Right Sidebar -->    
    <div class="admin-content">
<div style = "margin-left : 35%;">
<form name = "issuebook" method = "POST" onsubmit="return DateCheck()">
	<table>

	<tr>
					<td> Book ID </td>
					<td> <input type="text" name="bid"> </td>
				</tr>
				<tr>
					<td> Member ID </td>
					<td> <input type="text" name="mid"> </td>
				</tr>
				<tr>
					<td> Issue Date </td>
					<td> <input type="date" id="issdate" name="idate"> </td>
				</tr>
				<tr>
					<td> Return Date </td>
					<td> <input type="date" id="retdate" name="rdate"> </td>
				</tr>
				<tr>
					<td> <input type="submit" name="submit" value="Issue Book"> </td>
				</tr>
	</table>

</form>
        <?php
 if(isset($_POST) && array_key_exists('submit',$_POST))
 {

$bid=$_POST['bid'];
$mid=$_POST['mid'];
$idate=$_POST['idate'];
$rdate=$_POST['rdate'];


$sql = "INSERT INTO issue_details ". "(book_id,member_id,issue_date,return_date) ". "VALUES('$bid','$mid','$idate','$rdate')";


if($conn->query($sql))
 {

    echo "Book Issued";
    $sql1="UPDATE book_details JOIN issue_details ON issue_details.book_id=book_details.book_id SET book_details.copies=book_details.copies-1 WHERE issue_details.book_id='$bid'";
    $conn->query($sql1);



 }
 else
 {
    echo "Invalid Member ID or Book ID ";
 }


}
else{
    //do nothing
}
?>
</div>
  </div>
      <?php } 
    else
    {
    echo '<script language="javascript">';
    echo 'alert("You are not authorized to access this page")';
    echo '</script>';
    }
    ?>
</body>
</html>

