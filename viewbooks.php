<?php
session_start();
include('admin_session.php');
$type=$_SESSION['utype'];
?>
<html>
<head>
 <title>Admin - Library Management System</title>    
    
    <link rel="stylesheet" href="css/admin.css">

       <style type="text/css">
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

.booktable{
  display: flex;
  flex-direction: column;
  align-content: center;

}
#bt1{
font-weight: bold;
margin-left: 15px;
margin-top: 15px;
}


#bt2{
  margin-top: -250px;
  margin-left: -190px;
  align-self: center;
}


 </style> 
       

    <script language = "javascript">	
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

      <div class="booktable" id="bt1">
        <form method="POST">
           
                       Book Name 
                       <input type="text" name="bookname">
                  
                        <input type="submit" name="submit" value="Search"> 
            
        </form>
   			</div>
   			<div class="booktable" id="bt2">	
   			<h2 style="text-align: center;">Books Details</h2>
   			<table>
   				<thead>
   					<th>Book ID</th>
   					<th>Book Name</th>
   					<th>Author</th>
   					<th>Descriptiom</th>
   					<th>Category</th>
   					<th>ISBN</th>
					<th>Copies</th>
   					<th>Option</th>
   				</thead>
   				<tbody>

             <?php 
                        
                        if(isset($_POST['submit']))
                        {
                        
                         $bname=$_POST['bookname'];

                        $sql="SELECT * FROM book_details where book_name like '%$bname%'";

                        $result=mysqli_query($conn,$sql);
                        while($row=mysqli_fetch_assoc($result))
                        {
                            echo "<tr>";
                            foreach ($row as $field => $value) {
                                echo "<td>".$value."</td>";
                            
                            }
                            echo "<td><a href=\"deletebook.php?id=".$row['book_id']."\">Delete</a></td>";
                            echo "</tr>";
                        }
                    }
                    
   					
   					else{
   						$sql="SELECT * FROM book_details";
   						$result=mysqli_query($conn,$sql);
   						while($row=mysqli_fetch_assoc($result))
   						{
   							echo "<tr>";
   							foreach ($row as $field => $value) {
   								echo "<td>".$value."</td>";
   							
   							}
   							echo "<td><a href=\"deletebook.php?id=".$row['book_id']."\">Delete</a></td>";
   							echo "</tr>";

   						}
            }
   						?>
   					
   				</tbody>
   			</table>	
   			</div>
   		
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

