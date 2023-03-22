<?php 
session_start();
if($_SESSION['username']){
    echo "Welcome" . $_SESSION["username"];
}else{
    header("location: ../index.php");
}

require("includes/S2_db.php");
$id = $_GET['id'] ? intval($_GET['id']) : 0;

try {
    $sql = "SELECT * FROM tbl_ingredient WHERE id = :id LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();    
} catch (Exception $e) {
    echo "Error " . $e->getMessage();
    exit();
}

if (!$stmt->rowCount()) {
    header("Location: S2_index.php");
    exit();
}
$name = $stmt->fetch();

?>

<?php include("includes/S2_header.php") ?>
    <div class="container">
        <a href="S2_index.php" class="btn btn-light mb-3"><< Go Back</a>
        <!-- Show  a Product -->
        <div class="card border-dark">
            <div class="card-header bg-dark text-white">
                <strong><i class=""></i> Show Product</strong>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <!-- <th>Barcode</th>
                                <td><?= $name['barcode'] ?></td> -->
                                <th>Name</th>
                                <td><?= $name['name'] ?></td>
                            </tr>   
                            <tr>
                                <!-- <th>Price</th>
                                <td>$<?= number_format($name['price'], 2) ?></td> -->
                                <!-- <th>Qty</th>
                                <td><?= $name['qty'] ?></td> -->
                            </tr>  
                            <tr>
                                <th>Ingredients</th>
                                <td colspan="3"><?= $name['ingredient'] ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-3">
                        <img src="<?= $name['image'] ?>" alt="<?= $name['name'] ?>" class="img-fluid img-thumbnail">
                    </div>
                </div>
            </div>
        </div>
        <!-- End Show a name -->
        <br>
    </div><!-- /.container -->
<?php include("includes/S2_footer.php") ?>