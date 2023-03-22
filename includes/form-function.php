<?php
include_once 'config.php';

$user = mysqli_real_escape_String($con, $_POST["user"]);
$subject = mysqli_real_escape_String($con, $_POST["subject"]);
$body = mysqli_real_escape_String($con, $_POST["body"]);

//check the form if empty
if(empty($user)|| empty($subject) || empty($body)){
    header("Location: ../form.php?submit=empty");
}

else{
    $sql = "INSERT INTO tbl_feedback(id, username, subject, body, archive) VALUES ('','$user','$subject','$body','false')";
    mysqli_query($con, $sql);
    header("Location: ../form.php?submit=success");
}
?>