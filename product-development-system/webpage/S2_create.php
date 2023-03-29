<?php
include_once '../webpage/includes/db-connection.php';
 
$userid = $_POST['userid'];
 
$sql = "select * from tbl_research where id=".$userid;
$result = mysqli_query($conn,$sql);
while( $row = mysqli_fetch_array($result) ){
?>
        <form action="S2_add.php" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name" class="col-form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name" class="col-form-label">Research ID:</label>
                            <input type="text" class="form-control" id="name" name="researchID" value="<?php echo $userid?>" required readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="image" class="col-form-label">Description</label>
                            <input type="text" class="form-control" name="description" id="image" placeholder="Description">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="note" class="col-form-label">Ingredients</label>
                        <textarea name="ingredient" id="" rows="5" class="form-control" placeholder="Ingredients"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check-circle"></i> Save</button>
                </form>
<?php } ?>
                