<?php
include_once '../webpage/includes/db-connection.php';
 
$userid = $_POST['userid'];
 
$sql = "select * from tbl_ingredient where id=".$userid;
$result = mysqli_query($conn,$sql);
while( $row = mysqli_fetch_array($result) ){
?>
<form   action="../webpage/includes/upload.php" method="POST" enctype="multipart/form-data" >
    <h5>Product Concept Image</h5>
        <label>Ingredient ID:</label><br>
        <input type="text" value="<?php echo $userid?>" name="ingredientID" readonly><br>

        <label for="file">Image 1</label><br>
        <input type="file" name="file"><br><br>

        <label for="file">Image 2</label><br>
        <input type="file" name="packaging"><br><br>

        <label for="file">Image 3</label><br>
        <input type="file" name="file3"><br><br>

		<div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary">Update Data</button>
        </div>
	</form>	   
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
$(document).ready(function() {
    $('#uploadForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '../webpage/includes/upload.php',
            data: $('#uploadForm').serialize(),
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Successfully Uploaded',
                    didClose: function() {
                        // Refresh the page
                        location.reload();
                    }
                });

                $('#editmodal').modal('hide');

                // Add code here to update the table with the new data

            }
        });

    });
});
    </script> -->

<?php } ?>
	