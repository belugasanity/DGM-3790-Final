<?php
require_once('security.php');
require_once('connection.php');
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
    			<h1>Outstanding Orders</h1>
    			<hr>
    		</div>
    	</div>


    	<div class="row">
            <div class="col-xs-12">
                <form action="<?php $SERVER['PHP_SELF']; ?>" method="POST" name="checkoutForm">  
                <?php 

                    // Update records
                        if(isset($_POST['submit'])){
                            foreach ($_POST['orders'] as $orders_id) {
                                $query = "UPDATE orders SET is_active=0 WHERE id=$orders_id";

                                $result = mysqli_query($con, $query) or die('Query has failed to update records');
                            };
                        };

                    // Get Records
                    $query = "SELECT * FROM orders ORDER BY is_active DESC";

                    // TT Database
                    $result = mysqli_query($con, $query) or die('query has failed for pulling orders');

                    // display Records
                    echo '<table>
                     <tr>
                            <td></td>
                            <td>First Name</td>
                            <td>Last Name</td>
                            <td>Billing address</td>
                            <td>Shipping address</td>
                            <td>Amount</td>
                            <td>Quantity</td>
                            <td>Shipping Status</td>
                            <td>Payment Status</td>
                            <td>Product ID</td>
                            <td>Fulfilled?</td>
                        </tr>

                    ';
                    while ($row = mysqli_fetch_array($result)) {
                        if($row['is_active'] == 0){
                        echo '<label>

                        <tr class="fulfilled"><td></td>'
                        .'<td>'.$row['Bfirstname']. '</td> '
                        .'<td>'.$row['Blastname']. '</td> ' 
                        .'<td>'.$row['billing_address']. '</td> '
                        .'<td>'.$row['shipping_address']. '</td> '
                        .'<td>$'.$row['billing_amount']. '.00</td> '
                        .'<td>'.$row['quantity']. '</td> '
                        .'<td>'.$row['shipping_status']. '</td> '
                        .'<td>'.$row['payment_status']. '</td> '
                        .'<td>'.$row['product_id']. '</td> '
                        .'<td>Yes</td> '
                        .'<td>'.'</label>'.
                        '</tr>'
                      ;
                    }
                    else{
                       echo '<label>
                        <tr class="unfulfilled">
                        <td><input type="checkbox" 
                        value="'.$row['id'].'" name="orders[]" /></td>'
                        .'<td>'.$row['Bfirstname']. '</td> '
                        .'<td>'.$row['Blastname']. '</td> ' 
                        .'<td>'.$row['billing_address']. '</td> '
                        .'<td>'.$row['shipping_address']. '</td> '
                        .'<td>$'.$row['billing_amount']. '.00</td> '
                        .'<td>'.$row['quantity']. '</td> '
                        .'<td>'.$row['shipping_status']. '</td> '
                        .'<td>'.$row['payment_status']. '</td> '
                        .'<td>'.$row['product_id']. '</td> '
                        .'<td>No</td> '
                        .'<td>'.'</label>'.
                        '</tr>'
                      ; 
                    }
                    };
                    echo '</table>';
                ?>
                    

                    


                    <input type="submit" value="Fulfill" name="submit">
                    

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