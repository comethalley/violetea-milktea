<?php
include_once '../webpage/includes/db-connection.php';
 
$userid = $_POST['userid'];
 
$sql = "select * from tbl_concept where id=".$userid;
$result = mysqli_query($conn,$sql);
while( $row = mysqli_fetch_array($result) ){
?>
<form action="../webpage/includes/update-product-concept.php?id=<?php echo $row['id']; ?>" method="POST" enctype="multipart/form-data">
<h5>Product Concept Image</h5>
        <label>Ingredient ID:</label><br>
        <input type="text" value="<?php echo $row['ingredientID']; ?>" name="ingredientID" readonly><br>

        <label for="file">Image 1</label><br>
        <img src="../webpage/uploads/<?php echo $row['image']; ?>" width="100px" height="100px">
        <input type="file" name="file"><br><br>

        <label for="file">Image 2</label><br>
        <img src="../webpage/uploads/<?php echo $row['image2']; ?>" width="100px" height="100px">
        <input type="file" name="packaging"><br><br>

        <label for="file">Image 3</label><br>
        <img src="../webpage/uploads/<?php echo $row['image3']; ?>" width="100px" height="100px">
        <input type="file" name="file3"><br><br>

		<div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary">Update Data</button>
        </div>
                </form>
<?php } ?>