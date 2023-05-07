<?php
include_once '../webpage/includes/db-connection.php';

$userid = $_POST['userid'];

$sql = "SELECT * FROM tbl_ingredient INNER JOIN tbl_concept ON tbl_ingredient.id = tbl_concept.ingredientID where tbl_concept.id=" . $userid;
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result)) {
?>
        <form action="../webpage/includes/update-product-concept.php?id=<?php echo $row['id']; ?>" method="POST" enctype="multipart/form-data">
                <h5>Product Concept</h5>
                <label>Product Name:</label><br>
                <input type="text" class="form-control" value="<?php echo $row['name']; ?>" name="ingredientID" readonly><br>
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
                        <img src="../../admin/productimages/uploads/<?php echo $row['image2']; ?>" width="100px" height="100px">
                        <div class="custom-file">

                                <input type="file" name="packaging" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose Image 2</label>

                        </div>
                </div>

                <div class="form-group">
                        <img src="../../admin/productimages/uploads/<?php echo $row['image3']; ?>" width="100px" height="100px">
                        <div class="custom-file">

                                <input type="file" name="file3" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose Image 3</label>

                        </div>
                </div>

                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i> Save</button>
                </div>
        </form>
<?php } ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$(document).on('change', '.custom-file-input', function (event) {
    $(this).next('.custom-file-label').html(event.target.files[0].name);
})
        </script>