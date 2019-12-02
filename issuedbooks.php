<?php
session_start();
include('user_session.php');
$type=$_SESSION['utype'];
?>

<html>
<head>
 <title>Booked OUT - Library</title>    
    
    <link rel="stylesheet" href="css/admin.css">

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
      <?php if($type == "user") {?>
    <header>
              
        <div class="header-left">
             <div class="logo-text">
             <h1 class="logo-text"><span style="color: red">ABC Library</span></h1>
            </div>
        </div>
        
        <div class="header-right">
            
            <div class="side-top">   
                <div> <p>Welcome, <?php echo $login_session; ?></p></div>
                <div><a href="logout.php">Log Out</a></div>
            </div>

        </div>
             
    </header>
    
    <!-- Admin Wrapper -->
    <div class="admin-wrapper">
    
    <!-- Left Sidebar -->
    <div class="left-tab">
        <ul>
            <li><a href="member.php">Dashboard</a></li>
            <li><a href="searchbooks.php">Search Books</a></li>
            <li><a href="issuedbooks.php">Issued Books</a></li>
            <li><a href="changepass.php">Change Password</a></li>
        </ul>
    </div>
    
    <!-- Right Sidebar -->    
    <div class="admin-content">
 
        <div class="booktable"> 
              <h2>Issued Books</h2> 
            <table>
                <thead>
                    <th>Book ID</th>
                    <th>Book Name</th>
                    <th>Issue Date</th>
                    <th>Return Date</th>
                  
                  
                </thead>
                <tbody>
                    
                        <?php 
                        $sql="SELECT book_details.*,issue_details.* FROM book_details JOIN issue_details on issue_details.book_id=book_details.book_id";

                        $result=mysqli_query($conn,$sql);
                        
                        while($row=mysqli_fetch_assoc($result))
                        {
                            echo "<tr>";
                           
                                echo "<td>".$row['book_id']."</td>";
                                echo "<td>".$row['book_name']."</td>";
                                echo "<td>".$row['issue_date']."</td>";
                                echo "<td>".$row['return_date']."</td>";

                            
                            echo "</tr>";

                        }
                        ?>
                    
                </tbody>
            </table>    
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
