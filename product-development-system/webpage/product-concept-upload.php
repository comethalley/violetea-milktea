<?php
include_once '../webpage/includes/db-connection.php';

$userid = $_POST['userid'];

$sql = "select * from tbl_ingredient where id=" . $userid;
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result)) {
?> <div class="form-group">
        <form action="../webpage/includes/upload.php" method="POST" enctype="multipart/form-data">
            <h5>Product Concept Image</h5>
            <div class="form-group">
                <label>ID</label>
                <input type="text" value="<?php echo $userid ?>" name="ingredientID" class="form-control" readonly>
            </div>
            <div class="form-group">
                <div class="custom-file">
                    <input type="file" name="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose Image 1</label>
                </div>
            </div>
            <div class="form-group">
                <div class="custom-file">
                    <input type="file" name="packaging" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose Image 2</label>
                </div>
            </div>
            <div class="form-group">
                <div class="custom-file">
                    <input type="file" name="file3" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose Image 3</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Update Data</button>
            </div>
        </form>
    </div>
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
    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
<?php } ?>