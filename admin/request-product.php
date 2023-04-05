
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );

if(isset($_GET['del']))
		  {
		          mysqli_query($con,"delete from products where id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Product deleted !!";
		  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Manage Products</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>
<body>
<?php include('include/header.php');?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
<?php include('include/sidebar.php');?>				
			<div class="span9">
					<div class="content">

	<div class="module">
							<div class="module-head">
								<h3>Products Request</h3>
							</div>
							<div class="module-body table">
	<?php if(isset($_GET['del']))
{?>
									<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Oh snap!</strong> 	<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
									</div>
<?php } ?>

									<br />

							
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Product Name</th>
											<th>Image</th>
											<th>Image</th>
											<th>Image</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>

<?php $query=mysqli_query($con,"Select * from tbl_request where isAccepted='false'");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>									
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($row['name']);?></td>
											<td><img src="productimages/uploads/<?php echo htmlentities($row['image']);?>" alt="image.jpg" width="50px" height="50px"></td>
											<td><img src="productimages/uploads/<?php echo htmlentities($row['image2']);?>" alt="image.jpg" width="50px" height="50px"></td>
											<td><img src="productimages/uploads/<?php echo htmlentities($row['image3']);?>" alt="image.jpg" width="50px" height="50px"></td>
											<td>
											<button type="button" data-id='<?php echo htmlentities($row['id']); ?>' class="btn btn-success editbtn editbtn"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i> Add </button>
											</td>
										</tr>
										<?php $cnt=$cnt+1; } ?>
										
								</table>
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Product Name</th>
											<th>Image</th>
											<th>Image</th>
											<th>Image</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>

<?php $query=mysqli_query($con,"Select * from tbl_request where isAccepted='true'");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>									
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($row['name']);?></td>
											<td><img src="productimages/uploads/<?php echo htmlentities($row['image']);?>" alt="image.jpg" width="50px" height="50px"></td>
											<td><img src="productimages/uploads/<?php echo htmlentities($row['image2']);?>" alt="image.jpg" width="50px" height="50px"></td>
											<td><img src="productimages/uploads/<?php echo htmlentities($row['image3']);?>" alt="image.jpg" width="50px" height="50px"></td>
											<td>
											<button type="button" data-id='<?php echo htmlentities($row['id']); ?>' class="btn btn-success editbtn editbtn"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i> Add </button>
											</td>
										</tr>
										<?php $cnt=$cnt+1; } ?>
										
								</table>
							</div>
						</div>						

						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

	<!-- ADD POP UP FORM -->
	<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Add this product to the inventory? </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"></div>
            </div>
        </div>
    </div>

<?php include('include/footer.php');?>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>

	<!--Add modal function-->
    <script type='text/javascript'>
        $(document).ready(function(){
            $('body').on("click", ".editbtn", function(event){
                    var id = $(this).data('id');
                    $.ajax(
                        {
                            url: 'request.php',
                            type: 'post',
                            data: {id: id},
                            success: function(response){
                                $('.modal-body').html(response);
                                $('#editmodal').modal('show');
                            }
                        }
                    )
                });
            });
    </script>
</body>
<?php } ?>