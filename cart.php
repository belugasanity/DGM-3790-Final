<?php
    session_start();


    $updatedAmount = $_POST['changeAmount']; //value of cart item button clicked

    if (empty($_SESSION['potatoGun'])) {
        $_SESSION["potatoGun"] = 0;
    } //this initializes the SESSION potatoGun variable if the cart is empty


    if($_GET['id'] == 1) {
        $_SESSION["potatoGun"] += 1;
    } //this adds 1 to the potatoGun value as the id is pulled from the URL stream


    if($updatedAmount == "Add One") {
        $_SESSION["potatoGun"] += 1;
    }
    if($updatedAmount == "Delete One") {
        $_SESSION["potatoGun"] -= 1;
    }
    if($updatedAmount == "Empty Cart") {
        $_SESSION["potatoGun"] = 0;
    }
    if($_SESSION['potatoGun'] < 0) {
        $_SESSION['potatoGun'] = 0;
    }



    $price = 250;
    $tax = 10 * $_SESSION["potatoGun"];
    $shipping = 3;

    $totalCost = ($price * $_SESSION['potatoGun']) + $tax + $shipping;



    /*$whereIn = implode(',', $_SESSION['cart']);

    $sql = "SELECT * FROM products WHERE id IN (1)";*/

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
	      <li><a href="index.php">Home</a></li>
	      <li><a href="products.php">Products</a></li>
	      <li class="active"><a href="cart.php">Cart</a></li>
	      <li><a href="checkout.php">Checkout</a></li>
	      <li><a href="admin.php">Admin Panel</a></li>
	    </ul>
	  </div>
	</nav>


    <!--MAIN CONTENT-->
    <div class="container">
    	<div class="row">
    		<div class="col-xs-12">
    			<h1>Your Cart</h1>
    			<hr>
    		</div>
    	</div>


    	<div class="row">
            <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                <form action="cart.php" method="POST" name="cartForm">  

                    <div class="col-xs-3">
                        <img class="productImage" src="img/spudato.jpg">
                    </div>

                    <div class="col-xs-9">
                        <?php
                            echo "<p>You have ".$_SESSION["potatoGun"]." potato gun(s) in your cart.</p>";
                        ?>

                        <label>Add or remove item:

                    <input type="submit" value="Add One" name="changeAmount">
                    <input type="submit" value="Delete One" name="changeAmount">
                    <input type="submit" value="Empty Cart" name="changeAmount">

                            <?php
                                echo "<p>TOTAL COST: $";
                                print_r($totalCost);
                                echo ".00</p>";

                                echo "<p>Including $";
                                print_r($tax);
                                echo ".00 for tax and $";
                                print_r($shipping);
                                echo ".00 for shipping.</p>";
                            ?>

                    </div>

                    
                </form>
            </div>            
        </div>

        <br><br>

        <div class="row">
            <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                <a href="checkout.php"><button>Checkout Items</button></a>
            </div>
        </div>

        





    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>

</html>