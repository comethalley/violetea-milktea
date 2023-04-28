<?php 
session_start();
if($_SESSION['username']){
    echo "Welcome" . $_SESSION["username"];
}else{
    header("location: ../index.php");
}

require("includes/S2_db.php");

if ($_POST) {
    $id      = (int) $_POST['edit_id'];
    // $barcode = trim($_POST['barcode']);
    $name    = trim($_POST['name']);
    // $price   = (float) $_POST['price'];
    // $qty     = (int) $_POST['qty'];
    $product_formulation   = trim($_POST['product_formulation']);
    $ingredient_sourcing = trim($_POST['ingredient_sourcing']);
    $pricing_strategy = trim($_POST['pricing_strategy']);

    try {
        $sql = 'UPDATE tbl_ingredient 
                    SET name = :name, ingredient_sourcing = :ingredient_sourcing, product_formulation = :product_formulation, pricing_strategy = :pricing_strategy
                WHERE id = :id';

        $stmt = $conn->prepare($sql);
        // $stmt->bindParam(":barcode", $barcode);
        $stmt->bindParam(":name", $name);
        // $stmt->bindParam(":price", $price);
        // $stmt->bindParam(":qty", $qty);
        $stmt->bindParam(":product_formulation", $product_formulation);
        $stmt->bindParam(":ingredient_sourcing", $ingredient_sourcing);
        $stmt->bindParam(":pricing_strategy", $pricing_strategy);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        if ($stmt->rowCount()) {
            header("Location: ingredient.php?id=".$id."&status=updated");
            exit();
        }
        header("Location: ingredient.php?id=".$id."&status=fail_update");
        exit();
    } catch (Exception $e) {
        echo "Error " . $e->getMessage();
        exit();
    }
} else {
    header("Location: ingredient.php?id=".$id."&status=fail_update");
    exit();
}
?>