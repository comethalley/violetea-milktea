<?php
include_once '../webpage/includes/db-connection.php';
$userid = $_POST['userid'];
$sql = "select * from tbl_research where id=".$userid;
$result = mysqli_query($conn,$sql);
while( $row = mysqli_fetch_array($result) ){
?>
    <form id="myForm" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="name" class="col-form-label">Name</label>
      <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['title']; ?>" placeholder="Name" required readonly>
    </div>
    <div class="form-group col-md-6">
      <label for="name" class="col-form-label">Research ID:</label>
      <input type="text" class="form-control" id="researchID" name="researchID" value="<?php echo $userid?>" required readonly>
    </div>
  </div>
   
  <div class="form-group">
  <label for="image" class="col-form-label">Product Formulation</label>
      <textarea type="text" class="form-control" name="product_formulation" rows="5" id="product_formulation" placeholder="Enter Product Formulation" ></textarea>
    </div>
  <div class="form-group">
    <label for="note" class="col-form-label">Ingredients Sourcing</label>
    <!--<textarea name="ingredient_sourcing" id="ingredient_sourcing" rows="5" class="form-control" placeholder="Enter Ingredient Sourcing" ></textarea>-->
    <select name="ingredient_sourcing" id="ingredient_sourcing" class="span8 tip" onChange="getSubcat(this.value);"  required>
      <option value="">Select Ingredient</option> 
          <?php $query=mysqli_query($conn,"select * from ingredients");
            while($row=mysqli_fetch_array($query))
          {?>

      <option value="<?php echo $row['name'];?>"><?php echo $row['name'];?></option>
      <?php } ?>
    </select>
  </div>
  <div class="form-group">
    <label for="note" class="col-form-label">Pricing_strategy</label>
    <textarea name="pricing_strategy" id="pricing_strategy" rows="5" class="form-control" placeholder="Enter Pricing Strategy" ></textarea>
  </div>
  <button type="submit" class="btn btn-success"><i class="fa fa-check-circle"></i> Save</button>
</form>

 

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
$(document).ready(function() {
    $('#myForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'S2_add.php',
            data: $('#myForm').serialize(),
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Successfully Add',
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
    </script>

<?php } ?>
