<!--<?php
		session_start();
		if($_SESSION['username']){
			echo "Welcome" . $_SESSION["username"];
		}else{
			header("location: ../index.php");
		}

	include_once '../webpage/includes/db-connection.php';
	$id=$_GET['id'];
	$query=mysqli_query($conn,"select * from tbl_concept where id='$id'");
	$row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
<head>
<title>Archive Product</title>
<link rel="stylesheet" type="text/css" href="css/archive.css">
</head>
<body>
	<h2>Archive</h2>
	<form method="POST" action="../webpage/includes/archive-product.php?id=<?php echo $id; ?>">
    <label>Ingredient ID:</label><br>
        <input type="text" value="<?php echo $row['ingredientID']; ?>" name="ingredientID"><br>
        <img src="../webpage/uploads/<?php echo $row['image']; ?>" alt="image.jpg" width="100px" height="100px"><br><br>

		<button type="submit" name="submit">Archive</button>
	</form>
</body>
</html>-->

<?php
include_once '../webpage/includes/db-connection.php';
 
$archiveid = $_POST['archiveid'];
 
$sql = "SELECT * FROM tbl_ingredient INNER JOIN tbl_concept ON tbl_ingredient.id = tbl_concept.ingredientID where tbl_concept.id=" . $archiveid;
$result = mysqli_query($conn, $sql);
$result = mysqli_query($conn,$sql);
while( $row = mysqli_fetch_array($result) ){
?>
<h5>Are you sure you want to retrieve this data?</h5><br>
<form id="retcon"  method="POST" enctype="multipart/form-data">
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
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i> Yes</button>
                    </div>
</form>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
	 
<script>
	$(function() {
    $('#retcon').on('submit', function(e) {
      e.preventDefault(); // prevent default form submission behavior
      
      $.ajax({
        url: '../webpage/includes/retrieve-function-product.php?id=<?php echo $archiveid; ?>',
        type: 'POST',
        data: $(this).serialize(), // serialize form data
        success: function(response) {
            Swal.fire({
                icon: 'success',
                title: 'Retrieved Successfully',
                didClose: function() {
                    // Refresh the page
                    location.reload();
                }
            });
        },
        error: function(xhr, status, error) {
          // handle error
        }
      });
    });
  });
</script>

<?php } ?>
