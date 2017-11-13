<?php
session_start();
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
	    <!-- <ul class="nav navbar-nav">
	      <li class="active"><a href="index.php">Home</a></li>
	      <li><a href="products.php">Products</a></li>
	      <li><a href="cart.php">Cart</a></li>
	      <li><a href="checkout.php">Checkout</a></li>
	      <li><a href="admin.php">Admin Panel</a></li>
	    </ul> -->
	  </div>
	</nav>


    <!--MAIN CONTENT-->
    <div class="container bannerImg">
    	<div class="row">
    		<div class="col-xs-12">
    			<h1>Spud Shooters Deluxe</h1>
    			<hr>
    		</div>
    	</div>

    	<div class="row">
    		<div class="col-xs-12">
    			<h2>Welcome to the place where we sell cool stuff.</h2>
    		</div>
    	</div>

    	<div class="row">
    		<div class="col-xs-12 col-sm-6 col-sm-offset-3">
    			<p>Here is some words about this site we've got here. Go ahead and click on one of the links to navigate the site and get your very own Starch Cannon ordered directly to your house.</p>
    		</div>
    	</div>

    	<br>

    	<div class="row">
    		<div class="buttonBox col-xs-12 col-sm-4">
    			<a href="products.php"><button>Products</button></a>
    		</div>

    		<div class="buttonBox col-xs-12 col-sm-4">
    			<a href="checkout.php"><button>Checkout</button></a>
    		</div>

    		<div class="buttonBox col-xs-12 col-sm-4">
    			<a href="admin.php"><button>Admin Login</button></a>
    		</div>
    	</div>




    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>

</html>