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
    $description   = trim($_POST['description']);
    $ingredient = trim($_POST['ingredient']);

    try {
        $sql = 'UPDATE tbl_ingredient 
                    SET name = :name, ingredient = :ingredient, description = :description
                WHERE id = :id';

        $stmt = $conn->prepare($sql);
        // $stmt->bindParam(":barcode", $barcode);
        $stmt->bindParam(":name", $name);
        // $stmt->bindParam(":price", $price);
        // $stmt->bindParam(":qty", $qty);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":ingredient", $ingredient);
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