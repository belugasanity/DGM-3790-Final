<?php
    session_start();

    if (empty($_SESSION['potatoGun'])) {
        $_SESSION["potatoGun"] = 0;
    } //this initializes the SESSION potatoGun variable if the cart is empty


    $price = 250;
    $tax = 10 * $_SESSION["potatoGun"];
    $shipping = 3;

    $totalCost = ($price * $_SESSION['potatoGun']) + $tax + $shipping;



    /*$whereIn = implode(',', $_SESSION['cart']);

    $sql = "SELECT * FROM products WHERE id IN (1)";*/

?>

<?php
    require_once("./stripe/config.php");
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
    			<h1>Checkout</h1>
    			<hr>
    		</div>
    	</div>


    	<div class="row">
            <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                <form action="confirmation.php" method="POST" name="checkoutForm">  


                <h2>Shipping Information</h2>
                    <label>First name:<br>
                    <input type="text" name="Bfirstname" value="Bob"></label>
                    
                    <label>Last name:<br>
                    <input type="text" name="Blastname" value="Shmo"></label>

                    <label>Address:<br>
                    <input type="text" name="Baddress" value="1800 w Cherry St."></label>

                    <label>City:<br>
                    <input type="text" name="Bcity" value="Orem"></label>

                    <label>State:<br>
                    <input type="text" name="Bstate" value="UT"></label>

                    <label>Zip:<br>
                    <input type="text" name="Bzip" value="80050"></label>

                    <hr><br>


                <h2>Billing Information</h2>
                    <label>First name:<br>
                    <input type="text" name="Sfirstname" value="Bob"></label>
                    
                    <label>Last name:<br>
                    <input type="text" name="Slastname" value="Shmo"></label>

                    <label>Address:<br>
                    <input type="text" name="Saddress" value="1800 w Cherry St."></label>

                    <label>City:<br>
                    <input type="text" name="Scity" value="Orem"></label>

                    <label>State:<br>
                    <input type="text" name="Sstate" value="UT"></label>

                    <label>Zip:<br>
                    <input type="text" name="Szip" value="80050"></label>

                    <hr><br>

                    <input type="hidden" name="is_active_order" value="1">

                    <!-- <label>Card Number:<br>
                    <input type="text" name="creditcard" value="6011 0000 1111 2222"></label>

                    <label>CVV:<br>
                    <input type="text" name="cvv" value="123"></label>

                    <label>Expiration Date:<br>
                    <input type="date" name="expire" value="09/21/2017"></label> -->

                    <?php
                        echo "<h3>TOTAL COST: $";
                        print_r($totalCost);
                        echo ".00</p>";

                        echo "<p>Including $";
                        print_r($tax);
                        echo ".00 for tax and $";
                        print_r($shipping);
                        echo ".00 for shipping.</h3>";
                    ?>

                    <br><br>


                    <!-- Stripe API -->
                    <h1>Payment</h1>

                    <form action="charge.php" method="POST" class="paymentButton">
                        <script
                            type="text/javascript"
                            src="https://checkout.stripe.com/checkout.js"
                            class="stripe-button"
                            data-key="<?php echo $stripe['publishable_key'];?>"
                            data-name="Payment"
                            data-description="Spud Shoooter"
                            data-image="./img/spudato.jpg"
                            data-amount="<?php echo $totalCost * 100 ?>"
                            data-locale="auto"
                      ></script>
                    </form>
                    

                </form>
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