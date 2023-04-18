<?php
	include_once './db-connection.php';
 
    $question = mysqli_real_escape_String($conn, $_POST["question"]);

    //check the form if empty
    if(empty($question)) {
      
    } else {
        $sql = "INSERT INTO tbl_question(id, question, archive) VALUES ('', '$question', 'false')";
        mysqli_query($conn, $sql);
      
    }
    
?>