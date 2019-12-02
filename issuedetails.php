<?php
session_start();
include('admin_session.php');
$type=$_SESSION['utype'];
?>

<html>
<head>
 <title>Admin - Library Management System</title>    
    
    <link rel="stylesheet" type="text/css" href="./css/admin.css">
        <style type="text/css">
   .admin-wrapper .admin-content table,tr,td,th{
    border:2px solid red;
    border-collapse: collapse;
    margin-left: 50px;
    padding: 20px;
}

  .admin-wrapper .admin-content th{
    border:3px solid black;
  
}
</style>

</head>
<body>
          <?php if($type == "admin") {?>
    <header>
              
        <div class="header-left">
<!--
            <div class="logo">
            <img src="images/admin.png" alt="admin-icon" width="60px" height="50">
            </div>
-->
             <div class="logo-text">
             <h1 class="logo-text"><span style="color: red">ABC Library</span></h1>
            </div>
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
    
            <div class="booktable"> 
             <h2>Issued Books</h2>   
            <table>
                <thead>
                    <th>Book Name</th>
                    <th>Issue ID</th>
                    <th>Book ID</th>
                    <th>Member ID</th>
                    <th>Issue Date</th>
                    <th>Return Date</th>
                    <th>Option</th>
                </thead>
                <tbody>
                    
                        <?php 

                        $sql="SELECT book_details.book_name,issue_details.* FROM book_details JOIN issue_details on issue_details.book_id=book_details.book_id ";
                        $result=mysqli_query($conn,$sql);
                        while($row=mysqli_fetch_assoc($result))
                        {
                            echo "<tr>";
                            foreach ($row as $field => $value) {
                                echo "<td>".$value."</td>";
                            
                            }
                                echo "<td><a href=\"deleteissue.php?id=".$row['issue_id']."&bid=".$row['book_id']."\">Return</a></td>";
                            echo "</tr>";

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
