<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">

	    <title>Violetea Cafe FAQS Page</title>
		<link rel="shortcut icon" href="violet.png">
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	    
	    <!-- Customizable CSS -->
	    <link rel="stylesheet" href="assets/css/main.css">
	    <link rel="stylesheet" href="assets/css/green.css">
	    <link rel="stylesheet" href="assets/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/css/owl.transitions.css">
		<!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
		<link href="assets/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/animate.min.css">
		<link rel="stylesheet" href="assets/css/rateit.css">
		<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">

		<!-- Demo Purpose Only. Should be removed in production -->
		<link rel="stylesheet" href="assets/css/config.css">

		<link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
		<link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
		<link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
		<link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
		<link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
		<!-- Demo Purpose Only. Should be removed in production : END -->

		
		<!-- Icons/Glyphs -->
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">

        <!-- Fonts --> 
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		
	</head>
	<style>
	.background {
		background:  linear-gradient(to bottom left, #ffffff 42%, #B26BFF 96%);
}
</style>
    <body class="cnt-home">
	<div class = "background">
<header class="header-style-1">

	<!-- ============================================== TOP MENU ============================================== -->
<?php include('includes/top-header.php');?>
<!-- ============================================== TOP MENU : END ============================================== -->
<?php include('includes/main-header.php');?>
	<!-- ============================================== NAVBAR ============================================== -->
<?php include('includes/menu-bar.php');?>
<!-- ============================================== NAVBAR : END ============================================== -->

</header>

<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.php">Home</a></li>
				<li class='active'>FAQS</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-bd">
	<div class="container">
		<div class="my-wishlist-page inner-bottom-sm">
			<div class="row">
				<div class="col-md-12 my-wishlist">
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th colspan="4">FAQS</th>
				</tr>
			</thead>
			<tbody>

				<tr>
		
					<td style="font-size: 25px; "><b>Before using our website or placing an order, kindly read and understand our Terms and Conditions and Privacy Policy</td>

				</tr>
                <tr>
		
        <td style="font-size: 25px; "><b>How to Order? </b> <br>
        1. Take note of the SKU or Item Name  </td>
        
    </tr>
    <tr>
		
    <td style="font-size: 25px; "><b>How do I pay for my orders? </b> <br>
      <br> 1. The Tech It Now Online Sales Rep will verify your orders and reserve the item/s under the name that you provide. Make sure that the one you are chatting with is an admin of the TIN Viber Community to avoid being scammed. <br> 
      <br>2. Go to our Pickup Location in ----------------, Quezon City, NCR. <br>
      <br> 3. Pay the total amount due to our (Rider?Cashier?).</td>
    </tr>

    <tr>
		
        <td style="font-size: 25px; "><b>Did not find what you were looking for? </b><br>
        If the item is not posted on the website but you are aware that the items are available in the Philippine market, give us a chat on PCX Viber Community so we could help you purchase that specific product. <br>
    <br>TIN Viber Community: https://bit.ly/TINViberCommunity <br><br>
    Monday to Saturday, 7:00 AM to 10:00 PM.</td>
        
    </tr>


    <tr>
		
        <td style="font-size: 25px; "><b>I need support for my purchased product/s</b><br>
        Before contacting us, kindly read and understand our Warranty Policy<br>
    <br>TYou may bring your item together with its original accessories to the our Tech It Now store or to the nearest Authorized Service Center of the brand/product. <br>
    <br>Don’t forget to bring your proof of purchase (Warranty Slip and Sales Invoice), and all of the original accessories.<br>
    <br>Shipping fees to and from will be shouldered by the customer <br>
    <br>Be sure to pack the item properly when sending them back to us. Damages incurred during shipping may void your warranty.<br>
    <br>Returns not coordinated prior to shipping may get lost or delayed. Please coordinate with us before shipping the item<br>
    <br>Include the Warranty Slip and Sales Invoice inside the packaging.<br></td>
        
    </tr>

			</tbody>
		</table>
	</div>
</div>			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
	<?php include('includes/brands-slider.php');?>
</div>
</div>
<?php include('includes/footer.php');?>

	<script src="assets/js/jquery-1.11.1.min.js"></script>
	
	<script src="assets/js/bootstrap.min.js"></script>
	
	<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	
	<script src="assets/js/echo.min.js"></script>
	<script src="assets/js/jquery.easing-1.3.min.js"></script>
	<script src="assets/js/bootstrap-slider.min.js"></script>
    <script src="assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
	<script src="assets/js/scripts.js"></script>

	<!-- For demo purposes – can be removed on production -->
	
	<script src="switchstylesheet/switchstylesheet.js"></script>
	
	<script>
		$(document).ready(function(){ 
			$(".changecolor").switchstylesheet( { seperator:"color"} );
			$('.show-theme-options').click(function(){
				$(this).parent().toggleClass('open');
				return false;
			});
		});

		$(window).bind("load", function() {
		   $('.show-theme-options').delay(2000).trigger('click');
		});
	</script>
</body>
</html>
