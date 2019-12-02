<?php
session_start();
include('admin_session.php');
$type=$_SESSION['utype'];
?>

<html>
<head>
 <title>Admin - Library Management System</title>    
    
    <link rel="stylesheet" type="text/css" href="./css/admin.css">
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
        <div class="dash">
            <div class="content">
            <h1 style="text-indent: -20px; ">Users</h1>
            <?php
            $qry="SELECT * FROM user_details WHERE usertype='user'";
            $result = mysqli_query($conn, $qry);
            $count = mysqli_num_rows($result);
             echo "<h1>".$count."</h1>";
            ?>
            </div>
            <div class="content">
            <h1 style="text-indent: -25px; ">Books</h1>
               <?php
            $qry="SELECT * FROM book_details";
            $result = mysqli_query($conn, $qry);
            $count = mysqli_num_rows($result);
            echo "<h1>".$count."</h1>";
            ?>
            </div>
            <div class="content" id="content3">
            <h1 style="text-indent: -55px; white-space: nowrap;">Books Issued</h1>
             <?php
            $qry="SELECT * FROM issue_details";
            $result = mysqli_query($conn, $qry);
            $count = mysqli_num_rows($result);
            echo "<h1 style='text-align:center; margin-left:20px; margin-top:20px;'>".$count."</h1>";
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
