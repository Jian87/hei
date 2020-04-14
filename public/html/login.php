<!-- 

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<form action="../controller.php" method="POST">
		name: <input type="text" name="username"><br>
		email: <input type="text" name="email"><br>
		<input type="submit" name="submit" value="Submit">
	</form>

</body> -->
<!-- </html> -->

<!DOCTYPE html>
<html>
<head>
	<title>log-in</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/project.css" charset="utf-8">
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
    <script src="../js/main.js"></script>
</head>

<body>

	<?php
		require('db.php');
		session_start();
		if (isset($_POST['username'])){
			 $username = stripslashes($_REQUEST['username']);
			 $username = mysqli_real_escape_string($con,$username);
			 $password = stripslashes($_REQUEST['password']);
			 $password = mysqli_real_escape_string($con,$password);
			 // echo $password + "<br";
			 // echo md5($password); 
			 //Checking is user existing in the database or not
			 $query = "SELECT * FROM `user` WHERE username='".$username."'and password='".$password."'";
			 $result = mysqli_query($con,$query) or die(mysql_error());

			 $rows = mysqli_num_rows($result);
			 // echo json_encode($row);
		     if($rows==1){
		     	$_SESSION['username'] = $username;
		     	header("Location: ../");
		     }else{
		 		echo "<div class='form'>
			 <h3>Username/password is incorrect.</h3>
			 <br/>Click here to <a href='login.php'>Login</a></div>";
			 }

			  }else{
		?>
	<div class = "page-content">

        <div class="ad"></div>

        <div class = "header">
            <div class="top-menu">
                <span class="logo-text"> this is logo</span>
                <a class="header-btn" value = "1" name="home"> back home</a>
                <a class="header-btn" value="2" name="chart">my chart</a>
            </div>
        </div>

        <div class="filter">
            <ul class="filter-menu">
                <li class="filter-menu-detail"><a>Jewelry</a></li>
                <li class="filter-menu-detail"><a>Love & Engagement</a></li>
                <li class="filter-menu-detail"><a>Watches</a></li>
                <li class="filter-menu-detail"><a>Home & Accessories</a></li>
                <li class="filter-menu-detail"><a>Fragrance</a></li>
                <li class="filter-menu-detail"><a>Men’s</a></li>
                <li class="filter-menu-detail"><a>Gifts</a></li>
            </ul>
        </div>

        <div class="main-content">
        	<div class="login-body">
	        	<div class="form">
				<h1>Log In</h1>
				<form action="" method="post" name="login">
				<input type="text" name="username" placeholder="Username" required />
				<input type="password" name="password" placeholder="Password" required />
				<input name="submit" type="submit" value="Login" />
				</form>
				<p>Not registered yet? <a href='registration.php'>Register Here</a></p>
				</div>
				<?php } ?>
			</div>
        </div>
            
        <div class="story">
            <h1 class="story-header">Discover Necklaces & Pendants</h1>
            <p class="story-descrp">Nothing accentuates the neckline like a Tiffany necklace. Discover stunning designs for every day, from shimmering diamond pendants to delicate gold necklaces.</p>
            <ul class="story-option-list">
                <li class="story-option"><a>Gold Necklaces & Pendants</a></li>
                <li class="story-option story-option-right"><a>Gold Necklaces & Pendants</a></li>
                <li class="story-option story-option-right"><a>Gold Necklaces & Pendants</a></li>
            </ul>
        </div>
        <div class="ad">
        </div>
        <div class="footer">
            <div class="row final">
                <p>Copyright &copy; 2020 UTD-CS6314 TEAM16 Share Project</p>
                <p class="links"><a href="#">Home</a> / <a href="#">About</a> / <a href="#">Contact</a> / <a href="#">Browse</a></p>
            </div>   
        </div>
    </div>
    
</body>
</html>