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
		var p1 = document.Input.password.value;
		var p2 = document.Input.reEnterPassword.value;
		var u = document.Input.username.value;
		var len = u.length;
		var flag = 0;
		
			

		if(len < 8)
		{
			alert("Username should have atleast 8 characters.");
			document.Input.username = "";
			flag = 1;
		}

		if(p1 != p2)
		{	
			alert("Passwords Entered are Not the same.");
			document.Input.password.value = "";
			document.Input.reEnterPassword.value = "";
			flag = 1;
		}
		if(flag != 1)
			return true;
		else
			return false;
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
<form name = "Input" method = "POST" >
	<table>

<!--
	<tr>
	<td>Student ID</td>
	<td><input type = "text" name = "studentID" required></td>
	</tr>
-->

	<tr>
	<td>Name</td>
	<td><input type = "text" name = "name" required></td>
	</tr>

	<tr>
	<td>Gender</td>
	<td>
		<table>
		<tr>
			<td><input type = "radio" name = "gender" value = "male"> Male</td>
			<td><input type = "radio" name = "gender" value = "female"> Female</td>
			<td><input type = "radio" name = "gender" value = "others"> Others</td>
		</tr>
		</table>
	</td>
	</tr>

	<tr>
	<td>Roll No</td>
	<td><input type = "text" name = "rollno" required></td>
	</tr>

	<tr>
	<td>Email</td>
	<td><input type = "text" name = "email" required></td>
	</tr>
	
	<tr>
	<td>Course</td>
	<td><input type = "text" name = "course" required></td>
	</tr>

	<tr>
	<td>Username</td>
	<td><input type = "text" name = "username" required></td>
	</tr>

	<tr>
	<td>Password</td>
	<td><input type = "password" name = "password" required></td>
	</tr>

	<tr>
	<td>Re-enter Password</td>
	<td><input type = "password" name = "reEnterPassword" required></td>
	</tr>

	<tr>
	<td><input type = "submit" name="submit" value = "Submit" onclick = "return validate()"></td>
	<td><input type = "reset" value = "Reset"></td>
	</tr>

	</table>

	<?php
 if(isset($_POST) && array_key_exists('submit',$_POST))
 {
$name=$_POST['name'];
$gender=$_POST['gender'];
$roll=$_POST['rollno'];
$email=$_POST['email'];
$course=$_POST['course'];
$username=$_POST['username'];
$password=$_POST['password'];

				
			$sql2="select username from member_details where username='$username'";

			$res2=mysqli_query($conn,$sql2);
			$count=mysqli_num_rows($res2);

			$sql3="select username from user_details where username='$username'";
			$res3=mysqli_query($conn,$sql3);
			$count1=mysqli_num_rows($res3);

			if($count>=1)
			{
			echo '<script> alert("Username already exists"); </script>';
			 exit();
			}
			else if($count1>=1)
			{

			echo '<script> alert("Username already exists"); </script>';
			 exit();
			
			}
			else{

			}
				
	


$sql = "INSERT INTO member_details ". "(name,email,gender,roll_no,course,username) ". "VALUES('$name','$email','$gender','$roll','$course','$username')";

$sql1="INSERT INTO user_details ". "(username,password,usertype) ". "VALUES('$username','$password','user' )";


if($conn->query($sql)&&$conn->query($sql1))
 {

 	echo "Member Added";
 }
 else
 {
 	echo "Insertion failed";
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


