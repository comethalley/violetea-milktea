<?php 

session_start();
if($_SESSION['username']){
    echo "Welcome " . $_SESSION["username"];
}else{
    header("location: ../index.php");
}


require("includes/S2_db.php");

if ($_POST) {
    // $barcode = trim($_POST['barcode']);
    $name    = trim($_POST['name']);
    // $price   = (float) $_POST['price'];
    // $qty     = (int) $_POST['qty'];
    $product_formulation   = trim($_POST['product_formulation']);
    $ingredient_sourcing = trim($_POST['ingredient_sourcing']);
    $pricing_strategy = trim($_POST['pricing_strategy']);
    $research_ID = trim($_POST['researchID']);

    try {
        $sql = 'INSERT INTO tbl_ingredient( id, name, product_formulation, ingredient_sourcing, pricing_strategy, researchID, archive) 
                VALUES("",:name, :product_formulation, :ingredient_sourcing, :pricing_strategy, :researchID, "false")';

        $stmt = $conn->prepare($sql);
        // $stmt->bindParam(":barcode", $barcode);
        $stmt->bindParam(":name", $name);
        // $stmt->bindParam(":price", $price);
        // $stmt->bindParam(":qty", $qty);
        $stmt->bindParam(":product_formulation", $product_formulation);
        $stmt->bindParam(":ingredient_sourcing", $ingredient_sourcing);
        $stmt->bindParam(":pricing_strategy", $pricing_strategy);
        $stmt->bindParam(":researchID", $research_ID);
        $stmt->execute();
        if ($stmt->rowCount()) {
            header("Location: ingredient.php?status=created");
            exit();
        }
        header("Location: suggestion.php?status=fail_create");
        exit();
    } catch (Exception $e) {
        echo "Error " . $e->getMessage();
        exit();
    }
} else {
    header("Location: S2_create.php?status=fail_create");
    exit();
}
