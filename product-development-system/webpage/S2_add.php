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
    $description   = trim($_POST['description']);
    $ingredient = trim($_POST['ingredient']);
    $research_ID = trim($_POST['researchID']);

    try {
        $sql = 'INSERT INTO tbl_ingredient( id, name, description, ingredient, researchID, archive) 
                VALUES("",:name, :description, :ingredient, :researchID, "false")';

        $stmt = $conn->prepare($sql);
        // $stmt->bindParam(":barcode", $barcode);
        $stmt->bindParam(":name", $name);
        // $stmt->bindParam(":price", $price);
        // $stmt->bindParam(":qty", $qty);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":ingredient", $ingredient);
        $stmt->bindParam(":researchID", $research_ID);
        $stmt->execute();
        if ($stmt->rowCount()) {
            header("Location: S2_index.php?status=created");
            exit();
        }
        header("Location: S2_create.php?status=fail_create");
        exit();
    } catch (Exception $e) {
        echo "Error " . $e->getMessage();
        exit();
    }
} else {
    header("Location: S2_create.php?status=fail_create");
    exit();
}
?>