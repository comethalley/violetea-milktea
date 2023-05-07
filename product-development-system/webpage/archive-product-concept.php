 

<?php
include_once '../webpage/includes/db-connection.php';

$archiveid = $_POST['archiveid'];
 
$sql = "SELECT * FROM tbl_ingredient INNER JOIN tbl_concept ON tbl_ingredient.id = tbl_concept.ingredientID where tbl_concept.id=" . $archiveid;
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result)) {
?>
	<h5>Are you sure you want to archive this data?</h5><br>
	<form id="archive-form" method="POST" enctype="multipart/form-data">
	<h5>Product Concept</h5>
                <label>Product Name:</label><br>
                <input type="text" class="form-control" value="<?php echo $row['name']; ?>" name="ingredientID" readonly><br>
                <label>Ingredient ID:</label><br>
                <input type="text" class="form-control" value="<?php echo $row['ingredientID']; ?>" name="ingredientID" readonly><br>
                <div class="form-group">
					<label>Image 1:</label>
                        <img src="../../admin/productimages/uploads/<?php echo $row['image']; ?>" width="100px" height="100px">
                </div>
                <div class="form-group">
					<label>Image 2:</label>
                        <img src="../../admin/productimages/uploads/<?php echo $row['image2']; ?>" width="100px" height="100px">
                </div>

                <div class="form-group">
					<label>Image 3:</label>
                        <img src="../../admin/productimages/uploads/<?php echo $row['image3']; ?>" width="100px" height="100px">
                </div>

		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="button" name="submit" class="btn btn-primary" onclick="archiveData()"><i class="fa fa-check-circle"></i> Yes</button>

		</div>
	</form>
<?php } ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
	function archiveData() {
		// Get the form data
		var formData = new FormData(document.getElementById("archive-form"));

		// Send the AJAX request
		$.ajax({
			url: "../webpage/includes/archive-product.php?id=<?php echo $archiveid; ?>",
			type: "POST",
			data: formData,
			processData: false,
			contentType: false,
			success: function(response) {
				Swal.fire({
					icon: 'success',
					title: 'Successfully Archived',
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