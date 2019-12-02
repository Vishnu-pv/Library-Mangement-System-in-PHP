<?php
session_start();
include('user_session.php');
$type=$_SESSION['utype'];
?>

<html>
<head>
 <title>Booked OUT - Library</title>    
    
    <link rel="stylesheet" href="css/admin.css">
  <script language = "javascript">
    
    
    function validate()
    {

    

        var p1 = document.Input.password.value;
        var p2 = document.Input.reEnterPassword.value;

        
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
    
        <div class="changepass">
           
    <form name="Input" method="POST" onsubmit="return validate()">
         <div class="child">
            Enter current password
    
   <input type = "password" name = "curpass" required><br>
    </div>
    <div class="child">
        Enter new password
                                                        
   <input type = "password" name = "password" required><br>         

   </div>
   <div class="child">
   Re-enter Password
    <input type = "password" name = "reEnterPassword" required>
   

     </div>
        <div class="child1">
    <input type = "submit" name="submit" value = "Submit" onclick = "return validate()">
</div>
    </form>
    </div>
    </div>
<?php
  if(isset($_POST['submit']))
  {
        $newpass=$_POST['password'];
        $curpass=$_POST['curpass'];
        $uname=$_SESSION['login_user'];
        $sql="UPDATE user_details SET password='$newpass'where username='$uname'";
        $sql1="Select password from user_details where username='$uname'";

      
        $res=$conn->query($sql1);
        $rows=mysqli_fetch_row($res);
        if($rows[0]!=$curpass)
        {
            echo "Invalid Current password!";
        }
        else
        {
              $conn->query($sql);
                echo "Password Updated";
        }

      
    }
  
    ?>
        
    
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
