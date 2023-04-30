 

<?php
include_once '../webpage/includes/db-connection.php';

$archiveid = $_POST['archiveid'];

$sql = "select * from tbl_concept where id=" . $archiveid;
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result)) {
?>
	<h5>Are you sure you want to archive this data?</h5><br><br>
	<div class="form-group">
	<td><img src="../../admin/productimages/uploads/<?php echo $row['image']; ?>" width="100px" height="100px">
			<td>
				<p>IngredientID : <?php echo $row['ingredientID']; ?></p>
				 
			</td>
	</div>
	<form id="archive-form" method="POST" enctype="multipart/form-data">


		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="button" name="submit" class="btn btn-danger" onclick="archiveData()">Archive</button>

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