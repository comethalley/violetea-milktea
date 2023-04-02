<?php
include('include/config.php');
if(isset($_POST['submit']))
{
    $id = $_GET['id'];
	$category=$_POST['category'];
	$subcat=$_POST['subcategory'];
	$productname=$_POST['productName'];
	$productcompany=$_POST['productCompany'];
	$productprice=$_POST['productprice'];
	$productpricebd=$_POST['productpricebd'];
	$productdescription=$_POST['productDescription'];
	$productscharge=$_POST['productShippingcharge'];
	$productavailability=$_POST['productAvailability'];
	$productimage1=$_POST['image'];
	$productimage2=$_POST['image2'];
	$productimage3=$_POST['image3'];
    
$sql=mysqli_query($con,"insert into products(category,subCategory,productName,productCompany,productPrice,productDescription,shippingCharge,productAvailability,productImage1,productImage2,productImage3,productPriceBeforeDiscount) values('$category','$subcat','$productname','$productcompany','$productprice','$productdescription','$productscharge','$productavailability','$productimage1','$productimage2','$productimage3','$productpricebd')");
$sql2=mysqli_query($con,"UPDATE tbl_request SET isAccepted = 'true' WHERE id = '$id'");
header("Location: request-product.php?upload=success");

}

?>