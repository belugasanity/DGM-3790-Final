<?php
require_once('connection.php');
//database connection
$feedback = "";
if (isset($_POST['submit'])) {
  $email = mysqli_real_escape_string($con, trim($_POST['email']));
  $pass1 = mysqli_real_escape_string($con, trim($_POST['pass1']));
  $pass2 = mysqli_real_escape_string($con, trim($_POST['pass2']));


  if (!empty($email) && !empty($pass1) && !empty($pass2) && ($pass1 == $pass2)) {

    $query = "SELECT * FROM users WHERE email = '$email'";
    $user_exists = mysqli_query($con, $query) or die('Error Querying Databse - user exists');
    if (mysqli_num_rows($user_exists) == 0) {

      $query = "INSERT INTO users (email, password, is_active) VALUES ('$email', SHA('$pass1'), '1')";
      mysqli_query($con, $query) or die('Query failed');

      $feedback = '<p>Your new user has been created</p><p>Continue to the <a href="admin.php">Log in</a> page.</p>';

      setcookie('email', $email, time() + (60*60*24*30));
      // setcookie('firstname', $firstname, time() + (60*60*24*30));
      // setcookie('lastname', $lastname, time() + (60*60*24*30));

      mysqli_close($con);

      //exit();
      
    }else{
      $feedback = '<p>This username is already taken, please choose a new one</p>';
      $email = "";
    }// end check if existing user

  }// end of check if empty
}// end of isset


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
          <h1>Admin Registry</h1>
          <hr>
        </div>
      </div>
      <div class="row">
            <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                <form action="" method="POST">
                    <h2>Please Sign In</h2>
                    <label>Username:<br>
                    <input type="text" name="email" value="BobShmo101@me.com" required></label>
                    <!-- <input name="email" type="text" class="validate" required value="<?php //if(!empty($email)) echo $email; ?>"> -->
                    <label>Password:<br>
                    <input type="password" name="pass1" value="test123" required></label>
                    <input type="password" name="pass2" value="test123" required></label>
                    <button type="submit" name="submit">Submit</button>
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
