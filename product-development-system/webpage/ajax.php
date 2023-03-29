<?php
include_once '../webpage/includes/db-connection.php';
 
$userid = $_POST['userid'];
 
$sql = "select * from tbl_concept where id=".$userid;
$result = mysqli_query($conn,$sql);
while( $row = mysqli_fetch_array($result) ){
?>
<table border='0'>
<tr>
    <td><img src="../webpage/uploads/<?php echo $row['image']; ?>" width="100px" height="100px">
    <td><p>IngredientID : <?php echo $row['ingredientID']; ?></p></td>
</tr>
</table>
<form action="../webpage/includes/update-product-concept.php?id=<?php echo $row['id']; ?>" method="POST" enctype="multipart/form-data">
                    <label for="file">Product Concept Image</label><br>
                    <input type="file" name="file"><br>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary">Update Data</button>
                    </div>
                </form>
<?php } ?>