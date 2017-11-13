<ul class="nav navbar-nav">
	      <li><a href="index.php">Home</a></li>
	      <li><a href="products.php">Products</a></li>
	      <li><a href="cart.php">Cart</a></li>
	      <li><a href="checkout.php">Checkout</a></li>
	      <li><a href="admin.php">Admin Panel</a></li>
	      <?php 
	      	if(isset($_SESSION['login'])){
	      		echo '<li><a href="orders.php">Orders</a></li>';
	      		echo '<li><a href="inventory.php">Inventory</a></li>';
	      		echo '<li><a href="logout.php">Logout</a></li>';
	      	}
	      ?>
	    </ul>