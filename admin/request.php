<?php
include('include/config.php');
 
$userid = $_POST['id'];
 
$sql = "Select * from tbl_request where id=".$userid;
$result = mysqli_query($con,$sql);
while( $row = mysqli_fetch_array($result) ){
?>

<form action="insert-request-product.php?id=<?php echo $row['id'];?>" class="form-horizontal row-fluid" method="POST" enctype="multipart/form-data">

<div class="control-group">
<label class="control-label" for="basicinput">Category</label>
<div class="controls">
<select name="category" class="span8 tip" onChange="getSubcat(this.value);"  required>
<option value="">Select Category</option> 
<?php $query=mysqli_query($con,"select * from category");
while($row1=mysqli_fetch_array($query))
{?>

<option value="<?php echo $row1['id'];?>"><?php echo $row1['categoryName'];?></option>
<?php } ?>
</select>
</div>
</div>

									
<div class="control-group">
<label class="control-label" for="basicinput">Sub Category</label>
<div class="controls">
<select   name="subcategory"  id="subcategory" class="span8 tip" required>
</select>
</div>
</div>


<div class="control-group">
<label class="control-label" for="basicinput">Product Name</label>
<div class="controls">
<input type="text" value="<?php echo $row['name']; ?>" name="productName" readonly>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Product Company</label>
<div class="controls">
<input type="text"    name="productCompany"  placeholder="Enter Product Company Name" class="span8 tip" required>
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Product Price Before Discount</label>
<div class="controls">
<input type="text"    name="productpricebd"  placeholder="Enter Product Price" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Product Price After Discount(Selling Price)</label>
<div class="controls">
<input type="text"    name="productprice"  placeholder="Enter Product Price" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Product Description</label>
<div class="controls">
<textarea  name="productDescription"  placeholder="Enter Product Description" rows="6" class="span8 tip">
</textarea>  
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Product Shipping Charge</label>
<div class="controls">
<input type="text"    name="productShippingcharge"  placeholder="Enter Product Shipping Charge" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Product Availability</label>
<div class="controls">
<select   name="productAvailability"  id="productAvailability" class="span8 tip" required>
<option value="">Select</option>
<option value="In Stock">In Stock</option>
<option value="Out of Stock">Out of Stock</option>
</select>
</div>
</div>



<div class="control-group">
<label class="control-label" for="basicinput">Product Image1</label>
<img src="productimages/uploads/<?php echo $row['image']; ?>" width="100px" height="100px">
<input type="hidden" name="image" value="<?php echo $row['image']; ?>" hidden>
</div>


<div class="control-group">
<label class="control-label" for="basicinput">Product Image2</label>
<img src="productimages/uploads/<?php echo $row['image2']; ?>" width="100px" height="100px">
<input type="hidden" name="image2" value="<?php echo $row['image2']; ?>" hidden>
</div>



<div class="control-group">
<label class="control-label" for="basicinput">Product Image3</label>
<img src="productimages/uploads/<?php echo $row['image3']; ?>" width="100px" height="100px">
<input type="hidden" name="image3" value="<?php echo $row['image3']; ?>">
</div>

	<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn">Insert</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											</div>
										</div>
									</form>
<?php } ?>
<script>
function getSubcat(val) {
	$.ajax({
	type: "POST",
	url: "get_subcat.php",
	data:'cat_id='+val,
	success: function(data){
		$("#subcategory").html(data);
	}
	});
}
function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>	