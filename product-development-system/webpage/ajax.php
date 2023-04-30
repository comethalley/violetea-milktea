<?php
include_once '../webpage/includes/db-connection.php';

$userid = $_POST['userid'];

$sql = "select * from tbl_concept where id=" . $userid;
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result)) {
?>
        <form action="../webpage/includes/update-product-concept.php?id=<?php echo $row['id']; ?>" method="POST" enctype="multipart/form-data">
                <h5>Product Concept Image</h5>
                <label>Ingredient ID:</label><br>
                <input type="text" class="form-control" value="<?php echo $row['ingredientID']; ?>" name="ingredientID" readonly><br>
                <div class="form-group">
                        <img src="../../admin/productimages/uploads/<?php echo $row['image']; ?>" width="100px" height="100px">
                        <div class="custom-file">

                                <input type="file" name="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose Image 1</label>

                        </div>
                </div>
                <div class="form-group">
                        <img src="../../admin/productimages/uploads/<?php echo $row['image']; ?>" width="100px" height="100px">
                        <div class="custom-file">

                                <input type="file" name="packaging" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose Image 1</label>

                        </div>
                </div>

                <div class="form-group">
                        <img src="../../admin/productimages/uploads/<?php echo $row['image']; ?>" width="100px" height="100px">
                        <div class="custom-file">

                                <input type="file" name="file3" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose Image 1</label>

                        </div>
                </div>





                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary">Update Data</button>
                </div>
        </form>
<?php } ?>