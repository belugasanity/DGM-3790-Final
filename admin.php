<?php
require_once('connection.php');
session_start();
function d($debug){
    echo '<pre>';
    print_r($debug);
    echo "</pre>";
}
//database connection
$feedback = '<p><a href="register.php">Create an account</a></p>';

if (isset($_POST['submit'])) {
  $email = mysqli_real_escape_string($con, trim($_POST['email']));
  $pass1 = mysqli_real_escape_string($con, trim($_POST['pass1']));

  $query = "SELECT * FROM users WHERE email ='$email' AND password = SHA('$pass1')";
  $data = mysqli_query($con, $query) or die('query failed');

  if (mysqli_num_rows($data) == 1) {
    $row = mysqli_fetch_array($data);

      //setcookie('email', $row['email'], time() + (60*60*24*30));
    $_SESSION['login'] = $email;
    $_SESSION['LAST_ACTIVITY'] = time();
      header('Location:orders.php');
    
  }else{
      $feedback = '<p>Could not find an account for '. $_POST['email'].'. <a href="register.php">Create an account</a></p>';
  }//end else
}//end isset (post)

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Shopping Cart</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- Main CSS file -->
    <link href="css/main.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>




  <body>
  	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="index.php">Spuds R' Us</a>
	    </div>
	    <?php
            require_once('nav.php');
        ?>
	  </div>
	</nav>


    <!--MAIN CONTENT-->
    <div class="container">
    	<div class="row">
    		<div class="col-xs-12">
    			<h1>Admin Panel</h1>
    			<hr>
    		</div>
    	</div>
    	<div class="row">
            <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                <form action="admin.php" method="POST" name="loginForm">
                    <h2>Please Sign In</h2>
                    <label>Username:<br>
                    <input type="text" name="email" value="BobShmo101@me.com"></label>
                    <label>Password:<br>
                    <input type="text" name="pass1" value="test123"></label>
                    <input type="submit" value="Log In" name="submit">
                </form>
                <?php echo $feedback; ?>
            </div>            
        </div>

        <br><br>


        





    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>

</html>