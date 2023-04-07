<?php
include_once '../webpage/includes/db-connection.php';
 
$rejectid = $_POST['id'];
 
$sql = "SELECT * FROM tbl_ingredient INNER JOIN tbl_concept ON tbl_ingredient.id = tbl_concept.ingredientID WHERE tbl_concept.id=".$rejectid;
$result = mysqli_query($conn,$sql);
while( $row = mysqli_fetch_array($result) ){
?>
<h5>Are you sure you want to reject this data?</h5><br>

<form action="../webpage/includes/reject-product-function.php?id=<?php echo $row['id']; ?>" method="POST" enctype="multipart/form-data">
<h5>Product</h5>
        <label>Product Name:</label>
        <input type="text" value="<?php echo $row['name']; ?>" name="name" readonly><br>

        <label>Ingredient ID:</label>
        <input type="text" value="<?php echo $row['ingredientID']; ?>" name="ingredientID" readonly><br>

        <label for="file">Image 1</label><br>
        <img src="../../admin/productimages/uploads/<?php echo $row['image']; ?>" width="100px" height="100px"><br>

        <label for="file">Image 2</label><br>
        <img src="../../admin/productimages/uploads/<?php echo $row['image2']; ?>" width="100px" height="100px"><br>

        <label for="file">Image 3</label><br>
        <img src="../../admin/productimages/uploads/<?php echo $row['image3']; ?>" width="100px" height="100px"><br>

		<div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-danger">Reject</button>
        </div>
</form>
<?php } ?>