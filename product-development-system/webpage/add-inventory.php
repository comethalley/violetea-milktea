<?php
include_once '../webpage/includes/db-connection.php';
 
$userid = $_POST['id'];
 
$sql = "SELECT * FROM tbl_ingredient INNER JOIN tbl_concept ON tbl_ingredient.id = tbl_concept.ingredientID WHERE tbl_concept.archive='false' AND tbl_concept.id=".$userid;
$result = mysqli_query($conn,$sql);
while( $row = mysqli_fetch_array($result) ){
?>
<form action="../webpage/includes/add-inventory-function.php?id=<?php echo $row['id']; ?>" method="POST" enctype="multipart/form-data">
<h5>Are you sure you want to add this product to inventory?</h5>
        <label>Product Name</label><br>
        <input type="text" value="<?php echo $row['name']; ?>" name="name" readonly><br>

        <label for="file">Image 1</label><br>
        <img src="../webpage/uploads/<?php echo $row['image']; ?>" width="100px" height="100px">
        <input type="hidden" name="image" value="<?php echo $row['image']; ?>" hidden><br><br>

        <label for="file">Image 2</label><br>
        <img src="../webpage/uploads/<?php echo $row['image2']; ?>" width="100px" height="100px">
        <input type="hidden" name="image2" value="<?php echo $row['image2']; ?>" hidden><br><br>

        <label for="file">Image 3</label><br>
        <img src="../webpage/uploads/<?php echo $row['image3']; ?>" width="100px" height="100px">
        <input type="hidden" name="image3" value="<?php echo $row['image3']; ?>" hidden><br><br>

		<div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary">Add</button>
        </div>
                </form>
<?php } ?>