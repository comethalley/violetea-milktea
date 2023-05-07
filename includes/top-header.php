<?php 
//session_start();

?>

<div class="top-bar animate-dropdown">
	<div class="container">
		<div class="header-top-inner">
			<div class="cnt-account">
				<ul class="list-unstyled">

<?php if(strlen($_SESSION['login']))
    {   ?>
				<li><a href="#"><i class="icon fa fa-user"></i>Welcome -<?php echo htmlentities($_SESSION['username']);?></a></li>
				<?php } ?>

					<li><a href="my-account.php"><i class="icon fa fa-user"></i>My Account</a></li>
					<li><a href="my-wishlist.php"><i class="icon fa fa-heart"></i>Favorite</a></li>
					<li><a href="my-cart.php"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
					<li><a href="form.php"><i class="icon fa fa-share"></i>Share your suggestion!</a></li>
					<?php if(strlen($_SESSION['login'])==0)
    {   ?>
<li><a href="login.php"><i class="icon fa fa-sign-in"></i>Login</a></li>
<?php }
else{ ?>
	
				<li><a href="logout.php"><i class="icon fa fa-sign-out"></i>Logout</a></li>
				<?php } ?>	
				</ul>
			</div><!-- /.cnt-account -->

<div class="cnt-block">
				<ul class="list-unstyled list-inline">
					<li class="dropdown dropdown-small">
  <div class="dropdown-toggle">
    <span style="color: white "class="key">Active Order</span>
    <?php
      // start the PHP code
      // first, check if the user is logged in
      session_start();
      if (!isset($_SESSION['id'])) {
        // if the user is not logged in, display a message
        echo "<span class='value'>Please log in</span>";
      } else {
        // if the user is logged in, get their user ID from the session
        $userId = $_SESSION['id'];
        // query the database for the user's active order(s)
        $query = mysqli_query($con, "SELECT COUNT(*) as count FROM orders WHERE userId = $userId AND orderStatus = 'in Process'");

        if (mysqli_num_rows($query) == 0) {
          // if the query returns no results, display a message
          echo "<span class='value'>No active orders</span>";
        } else {
          // if the query returns one or more results, display the count of active order(s)
          $row = mysqli_fetch_assoc($query);
          $count = $row['count'];
          echo "<span class='value' style='color: white' id='active-order-count'>$count</span>";
        }
      }
    ?>
    <div class="dropdown-menu">
      <?php
        if (mysqli_num_rows($query) > 0) {
          // if the query returns one or more results, display the status(es) of the active order(s)
          echo "<ul>";
          $query = mysqli_query($con, "SELECT orders.orderStatus as status, products.productName as productName FROM orders JOIN products ON orders.productId = products.id WHERE orders.userId = $userId AND orders.orderStatus = 'in Process'");
          while ($row = mysqli_fetch_assoc($query)) {
            echo "<li>" . $row['productName'] . ": <a href='#'>" . $row['status'] . "</a></li>";
          }
          echo "</ul>";
        }
      ?>
    </div>
  </div>
</li>

<script>
// Add a click event listener to the active order notification
document.querySelector('.dropdown-toggle').addEventListener('click', function() {
  // Get the dropdown menu
  const dropdownMenu = this.querySelector('.dropdown-menu');
  // Toggle the show class to display/hide the dropdown menu
  dropdownMenu.classList.toggle('show');
});

// Add a mouseout event listener to the active order notification
document.querySelector('.dropdown-toggle').addEventListener('mouseout', function() {
  this.querySelector('.dropdown-menu').classList.remove('show');
});
</script>

<style type="text/css">
	.dropdown-toggle {
  position: relative;
}

.dropdown-menu {
  display: none;
  position: absolute;
  top: 100%;
  left: 0;
  z-index: 100;
  padding: 0.5rem 0;
  margin: 0;
  background-color: #fff;
  border: 1px solid #ccc;
  box-shadow: 0 2px 4px rgba(0,0,0,0.2);
  list-style: none;
}

.dropdown-menu.show {
  display: block;
}

.dropdown-menu li {
  padding: 0.25rem 1rem;
  font-size: 1.5rem;
  line-height: 1.5;
}

.dropdown-menu li a {
  color: #007bff;
  text-decoration: none;
}

.dropdown-menu li a:hover {
  text-decoration: underline;
}

</style>

					<li class="dropdown dropdown-small">
						<a href="order-history.php" class="dropdown-toggle" ><span class="key">Order History</b></a>
						
					</li>

				
				</ul>
			</div>
			
			<div class="clearfix"></div>
		</div><!-- /.header-top-inner -->
	</div><!-- /.container -->
</div><!-- /.header-top -->