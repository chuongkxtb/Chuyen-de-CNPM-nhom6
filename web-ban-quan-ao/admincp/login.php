<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Login</title>
  </head>
  <body>
  
<?php
	include '../classes/adminlogin.php';

?>
<?php
	$class = new adminlogin();
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$adminUser = $_POST['username'];
		$adminPass = md5($_POST['password']);

		$login_check = $class->login_admin($adminUser,$adminPass);

	}
?>
  
  <div class="content">
    <div class="container">
      <div class="row">

        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Admin Login</h3>
              <span><?php if(isset($login_check)) echo $login_check; ?></span>
            </div>
            <form action="login.php" method="post">
              <div class="form-group first">
               
                <input type="text" placeholder="Username" class="form-control" name="username">

              </div>
              <div class="form-group last mb-4">
             
                <input type="password" placeholder="Password" class="form-control" name="password">
                
              </div>
              
    

              <input type="submit" value="Log In" class="btn btn-block btn-primary">

        
              
             
            </form>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>

  
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>