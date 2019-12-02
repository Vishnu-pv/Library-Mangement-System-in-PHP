<?php
session_start();
include('user_session.php');
$type=$_SESSION['utype'];
?>

<html>
<head>
 <title>Booked OUT - Library</title>    
    
    <link rel="stylesheet" href="css/admin.css">
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
    <div class="admin-content" id="dashuser">
        
        <div class="dash-user">
            <div id="data">    
            <?php 
                $sql="SELECT * FROM member_details WHERE username='$login_session'";
                $result=mysqli_query($conn,$sql);
                $row=mysqli_fetch_assoc($result);
                $sid=$row['stud_id'];
                $sql1="SELECT * FROM issue_details where member_id='$sid'";
                $resl1=mysqli_query($conn,$sql1);
                $count=mysqli_num_rows($resl1);
               
                
                    echo "ID : ".$row['stud_id'];
                    echo "<br>Name : ".$row['name'];
                    echo "<br>Gender : ".$row['gender'];
                    echo "<br>Roll No : ".$row['roll_no'];
                    echo "<br>Course : ".$row['course'];
                    echo "<br>Username : ".$row['username'];
                    echo "<br>Books Taken : ".$count;

            ?>
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
