
<?php
    
    $id = $_POST[id];
    $itemName = $_POST[itemName];
    $price = $_POST[price];
    $newAmount = $_POST[amount];

    //BUILD CONNECTION TO DB - localhost means it's on the same server
    $databaseConnect = mysqli_connect('45.40.164.71', 'dgm3790', 'October2017!', 'dgm3790') or die('Could not connect to Database');
    

    //BUILD THE QUERY
    $query = "UPDATE products SET inventory='$newAmount', price='$price', name='$itemName' WHERE id=$id";

    //WORK WITH THE DB
    $result = mysqli_query($databaseConnect, $query) or die('Inventory update query failed!');


    //CLOSE CONNECTION
    mysqli_close($databaseConnect);

    //REDIRECT TO THE CORRECT PAGE
    header("Location: inventory.php");


?>
