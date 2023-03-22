<?php 
require("includes/S2_db.php");

if (isset($_POST['archive_id'])) {

    try {
        $sql = 'UPDATE tbl_ingredient SET archive = "true" WHERE id = :id LIMIT 1';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id", $_POST['archive_id'], PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount()) {
            header("Location: ingredient.php?status=deleted");
            exit();
        }
        header("Location: ingredient.php?status=fail_delete");
        exit();
    } catch (Exception $e) {
        echo "Error " . $e->getMessage();
        exit();
    }
} else {
    header("Location: ingredient.php?status=fail_delete");
    exit();
}
