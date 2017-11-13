<?php
session_start();
$fbuid = $_SESSION["fbuid"];
if(intval($fbuid) == 0){
	header("Location: ../");
}

echo "<img style='max-height:100px;' src='./img/spudato.jpg'>  User Id: " . $fbuid . "<br>";
?>
<?php
require_once("config.php");
      
$token = $_POST['stripeToken'];
    
$customer = \Stripe\Customer::create(array(
		'email' => 'customer@example.com',
		'source' => $token
	));
      
$charge = \Stripe\Charge::create(array(
		'customer' => $customer->id,
		'amount' => $totalCost,
		'description' => 'Example Charge',
		'currency' => 'usd'
	));
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
	    <ul class="nav navbar-nav">
	      <li class="active"><a href="index.php">Home</a></li>
	      <li><a href="products.php">Products</a></li>
	      <li><a href="cart.php">Cart</a></li>
	      <li><a href="checkout.php">Checkout</a></li>
	      <li><a href="admin.php">Admin Panel</a></li>
	    </ul>
	  </div>
	</nav>


    <!--MAIN CONTENT-->
    <div class="container">
        <script>
            var fbuid = "<?php echo "$fbuid" ?>";
        </script>


        <h1>Successfully charged $totalCost</h1>

        <a href="../public/checkForPending.php?fbuid=<?php echo $fbuid; ?>">Return to Site</a>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>


