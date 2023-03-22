<?php
include_once 'db-connection.php';

$user = mysqli_real_escape_String($conn, $_POST["user"]);
$subject = mysqli_real_escape_String($conn, $_POST["subject"]);
$body = mysqli_real_escape_String($conn, $_POST["body"]);

//check the form if empty
if(empty($user)|| empty($subject) || empty($body)){
    header("Location: ../form.php?submit=empty");
}

else{
    $sql = "INSERT INTO tbl_feedback(id, username, subject, body) VALUES ('','$user','$subject','$body')";
    mysqli_query($conn, $sql);
    header("Location: ../form.php?submit=success");
}
?>