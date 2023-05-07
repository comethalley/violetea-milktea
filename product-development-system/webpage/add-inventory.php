<?php
include_once '../webpage/includes/db-connection.php';

$userid = $_POST['id'];

$sql = "SELECT * FROM tbl_ingredient INNER JOIN tbl_concept ON tbl_ingredient.id = tbl_concept.ingredientID WHERE tbl_concept.archive='false' AND tbl_concept.id=" . $userid;
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result)) {
?>
        <form id="add-inventory-form" method="POST" enctype="multipart/form-data">

                <h5>Are you sure you want to add this product to inventory?</h5>
                <label>Product Name</label><br>
                <input type="text" class="form-control" value="<?php echo $row['name']; ?>" name="name" readonly><br>

                <label for="file">Image 1</label><br>
                <img src="../../admin/productimages/uploads/<?php echo $row['image']; ?>" width="100px" height="100px">
                <input type="hidden" name="image" value="<?php echo $row['image']; ?>" hidden><br><br>

                <label for="file">Image 2</label><br>
                <img src="../../admin/productimages/uploads/<?php echo $row['image2']; ?>" width="100px" height="100px">
                <input type="hidden" name="image2" value="<?php echo $row['image2']; ?>" hidden><br><br>

                <label for="file">Image 3</label><br>
                <img src="../../admin/productimages/uploads/<?php echo $row['image3']; ?>" width="100px" height="100px">
                <input type="hidden" name="image3" value="<?php echo $row['image3']; ?>" hidden><br><br>

                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" name="submit" class="btn btn-primary" onclick="addInventory()"><i class="fa-solid fa-plus" style="color: #ffffff;"></i>Add</button>

                </div>
        </form>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
                function addInventory() {
                        // Get the form data
                        var formData = new FormData(document.getElementById("add-inventory-form"));

                        // Send the AJAX request
                        $.ajax({
                                url: "../webpage/includes/add-inventory-function.php?id=<?php echo $row['id']; ?>",
                                type: "POST",
                                data: formData,
                                processData: false,
                                contentType: false,
                                success: function(response) {
                                        Swal.fire({
                                                icon: 'success',
                                                title: 'Product Added to Inventory',
                                                didClose: function() {
                                                        // Refresh the page
                                                        location.reload();
                                                }
                                        });
                                        console.log(response);
                                },
                                error: function(xhr, status, error) {
                                        // Handle the AJAX error
                                        console.log(error);
                                }
                        });

                        // Prevent the form from submitting
                        return false;
                }
        </script>
<?php } ?>