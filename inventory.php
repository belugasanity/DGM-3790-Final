<?php
require_once('security.php');
require_once('connection.php');
$user = $_SESSION['login'];
$query1 = "SELECT * FROM users WHERE email='$user'";
$result1 = mysqli_query($con, $query1) or die('Query 1 failed');
$permission = mysqli_fetch_array($result1);
if($permission['permission'] < 2){
    echo "you don't have permission to view this page";
    exit();
}else{
    //BUILD THE QUERY
    $query = "SELECT * FROM products ORDER BY name ASC"; //no ID because it will auto increment in the DB


    //WORK WITH THE DB
    $result = mysqli_query($con, $query) or die('Query failed!');

        //ADD RESULT TO A VARIABLE
    $found = mysqli_fetch_array($result);


    //CLOSE CONNECTION
    mysqli_close($con);
}



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
    			<h1>Current Inventory</h1>
    			<hr>
    		</div>
    	</div>


    	<div class="row">
            <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                <form action="inventoryUpdate.php" method="POST" name="checkoutForm">  
                                       
                    <?php
                        echo '<h3>Name: <input type="text" name="itemName" value="'.$found['name'].'"> (ID#'.$found['id'].')</h3>';
                        echo '<p>Inventory Amount: <input type="number" name="amount" value="'.$found['inventory'].'"><br>';
                        echo 'Current Price: <input type="number" name="price" value="'.$found['price'].'" ></p>';
                    ?>
                    
                    <input type="hidden" name="id" value="<?php echo $found['id'];?>">
                    <input type="submit" value="Update" name="submit">                    

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