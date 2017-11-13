<?php
session_start();
require_once('connection.php');
//database connection
$query = "SELECT * FROM products WHERE is_active=1 ORDER BY name";

$result= mysqli_query($con, $query) or die('Query Failed');

mysqli_close($con);

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
    			<h1>Our Products</h1>
    			<hr>
    		</div>
    	</div>

    	<div class="row">
    		<div class="col-xs-12">
    			<h2>Here's what we have available:</h2>
    		</div>
    	</div>

    	<div class="row">
            <div class="col-xs-12 col-sm-5 col-sm-offset-1">
                <img class="productImage" src="img/spudato.jpg">
            </div>
            <?php
            while($data = mysqli_fetch_array($result)){
            echo '<div class="col-xs-12 col-sm-5">';
            echo '<h3>'.$data['name'].'</h3>';
            echo '<p>Here is some words about this cool potato gun we have and that you should buy. Its real neat, we promise!</p>';
            echo '<h3>$'.$data['price'].'</h3>'; 
            echo '<h6>(plus $3.00 flat rate shipping and $10 flat rate tax)</h6>';

            echo '<a href="cart.php?id=1"><button>Add to Cart</button></a>';
            echo '</div>';
        };
        ?>
        </div>

        



    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>

</html>