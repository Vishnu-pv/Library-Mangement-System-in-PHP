<?php
session_start();
include('admin_session.php');
$type=$_SESSION['utype'];
?>
<html>
<head>
 <title>Admin - Library Management System</title>    
    
    <link rel="stylesheet" href="css/admin.css">
    
    
    <script language = "javascript">
	
	
	function validate()
	{
		p1 = document.Input.password.value;
		p2 = document.Input.reEnterPassword.value;

		if(p1 != p2)
		{	
			alert("Passwords Entered are Not the same.");
			document.Input.password.value = "";
			document.Input.reEnterPassword.value = "";
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
<form name = "Input" method = "POST">
	<table>

	<tr>
					<td> Book ID </td>
					<td> <input type="text" name="bookid"> </td>
				</tr>
				<tr>
					<td> Book Name </td>
					<td> <input type="text" name="bookname"> </td>
				</tr>
				<tr>
					<td> Author </td>
					<td> <input type="text" name="author"> </td>
				</tr>
				<tr>
					<td> Description </td>
					<td> <input type="text" name="description"> </td>
				</tr>
				<tr> 
					<td> Category </td>
					<td> <input type="text" name="category"> </td>
				</tr>
				<tr>
					<td> Isbn </td>
					<td> <input type="text" name="isbn"> </td>
				</tr>
				<tr>
					<td> Copies </td>
					<td> <input type="text" name="copies"> </td>		
				</tr>
				<tr>
					<td> <input type="submit" name="submit" value="Add Book"> </td>
				</tr>
	</table>
	<?php
 if(isset($_POST) && array_key_exists('submit',$_POST))
 {

$bid=$_POST['bookid'];
$bname=$_POST['bookname'];
$auth=$_POST['author'];
$desc=$_POST['description'];
$category=$_POST['category'];
$isbn=$_POST['isbn'];
$copies=$_POST['copies'];


$sql = "INSERT INTO book_details ". "(book_id,book_name,author,description,category,isbn,copies) ". "VALUES('$bid','$bname','$auth','$desc','$category','$isbn',$copies)";

if($conn->query($sql))
 {

 	echo "Book Added";
 }
 else
 {
 	echo "Insertion Failed";
 }


}
else{
	//do nothing
}
?>

</form>
</div>
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

