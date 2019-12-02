<?php
session_start();
include('admin_session.php');
$type=$_SESSION['utype'];
?>
<html>
<head>
 <title>Admin - Library Management System</title>   <style type="text/css">
   .admin-wrapper .admin-content table,tr,td,th{
    border:2px solid red;
    border-collapse: collapse;
    margin-left: 50px;
    padding: 20px;
}
th{
  font-size: 18px;
  }

  .admin-wrapper .admin-content th{
    border:3px solid black;
}
  
}

.membertable{
  display: flex;
  flex-direction: column;
  align-content: center;

}
#mt1{
font-weight: bold;
margin-left: 15px;
margin-top: 15px;
}


#mt2{
  margin-top: -250px;
  margin-left: -190px;
  align-self: center;
}


 </style> 
    
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

       <div clas="membertable" id="mt1">
          <form method="POST">
           
                       Member Name 
                       <input type="text" name="membername">
                  
                        <input type="submit" name="submit" value="Search"> 
            
        </form>
      </div>
   			<div class="membertable" id="mt2">	
   			<h2 style="text-align: center;">Member Details</h2>
   			<table>
   				<thead>
   					<th>StudentID</th>
   					<th>Name</th>
            <th>Email</th>
   					<th>Gender</th>
   					<th>RollNo</th>
   					<th>Course</th>
   					<th>Username</th>
   					<th>Option</th>
   				</thead>
   				<tbody>
   				
   						<?php 
                
                if(isset($_POST['submit']))
                {
                  $membername=$_POST['membername'];
   						$sql="SELECT * FROM member_details where name like '%$membername%'";

   						$result=mysqli_query($conn,$sql);
   						while($row=mysqli_fetch_assoc($result))
   						{
   							echo "<tr>";
   							foreach ($row as $field => $value) {
   								echo "<td>".$value."</td>";
   							}
   								echo "<td><a href=\"deleteuser.php?id=".$row['username']."\">Delete</a></td>";
   							echo "</tr>";
   							
   							
   						}
            }
              else
              {
                    $sql="SELECT * FROM member_details";
              $result=mysqli_query($conn,$sql);
              while($row=mysqli_fetch_assoc($result))
              {
                echo "<tr>";
                foreach ($row as $field => $value) {
                  echo "<td>".$value."</td>";
                }
                  echo "<td><a href=\"deleteuser.php?id=".$row['username']."\">Delete</a></td>";
                echo "</tr>";

              }
            }
   						?>
   					
   				</tbody>
   			</table>
   			

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

