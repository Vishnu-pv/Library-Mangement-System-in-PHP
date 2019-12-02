<?php
include ('login.php');
?>

<html>
	<head>
		<title>Login - Online Library Management System</title>
		<link rel="stylesheet" href="css/index.css">
	</head>
	<body > 
		<div class="title-text">
		<h2 class = "heading">  BOOKED OUT  </h2>

		</div>
		
		<div class="input-form">
		<form method="POST">
		<div class="log">
			<h4 > LOG IN </h4> 
		</div>
	        <div class="input-item">

					Username
					<input type="text" name="username" placeholder="username" required id="i1"> 
			</div>
			<div class="input-item">
					Password
					<input type="password" name="password" placeholder="********" required id="i2">
			</div>
			<div class="input-item">
					User Type
			
					<select name="usertype" id="i3">
						<option value="admin">Admin</option>
						<option value="user">Member</option>
					</select>
			</div>
			<div class="input-item">
					<input type="submit" name="submit" value="Log In" id="i4">
			</div>		
			
        
        </form>
		</div>
        
	</body>
</html>


	
