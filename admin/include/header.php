<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
				<i class="icon-reorder shaded"></i>
			</a>

		  	<a class="brand" href="change-password.php">
		  		Shopping Portal | Admin
		  	</a>

			<div class="nav-collapse collapse navbar-inverse-collapse">

			<?php
					// Query to select the ingredients where quantity is less than or equal to notify_quantity
					$sql = "SELECT * FROM ingredients WHERE  quantity <= notify_quantity";

					// Execute the query and check for errors
					$result = mysqli_query($con, $sql);
					if (!$result) {
					    die("Error in SQL query: " . mysqli_error($con));
					}

					// Check if any rows were returned
					$num_rows = mysqli_num_rows($result);
					if (mysqli_num_rows($result) > 0) {
					    // Send a notification\
						echo '<ul class="nav navbar-nav navbar-right">';
					    echo '<li><a href="#"class="dropdown-toggle" data-toggle="dropdown" style="color: red;"><i class="icon-bell"></i><span class="badge badge-important">' . $num_rows . '</span></b></a>';
						echo '<ul class="dropdown-menu">';
				    while ($row = mysqli_fetch_assoc($result)) {
				        $ingredient_name = $row['name'];
				        $quantity = $row['quantity'];
						$unit = $row['unit'];
				        $notify_quantity = $row['notify_quantity'];
				        echo "<li><a style='color: red;' href='manage-products.php'>$ingredient_name's quantity: $quantity $unit</a></li>";
				    }
				    echo '</ul>';
				    echo '</li>';
				    echo '</ul>';
					}
					?>


				<ul class="nav pull-right">
					<li><a href="#">
						Admin
					</a></li>
					<li class="nav-user dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img src="images/user1.png" class="nav-avatar" />
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu">
							<li><a href="change-password.php">Change Password</a></li>
							<li class="divider"></li>
							<li><a href="logout.php">Logout</a></li>
						</ul>
					</li>
					
					
					
				</ul>
				

			</div><!-- /.nav-collapse -->
		</div>
	</div><!-- /navbar-inner -->
</div><!-- /navbar -->
