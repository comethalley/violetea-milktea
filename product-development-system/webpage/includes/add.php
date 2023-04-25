
<?php
	include_once './db-connection.php';
 
    $title = mysqli_real_escape_String($conn, $_POST["title"]);
    $introduction = mysqli_real_escape_String($conn, $_POST["introduction"]);
    $market = mysqli_real_escape_String($conn, $_POST["market"]);
    $user = mysqli_real_escape_String($conn, $_POST["user"]);
    $technical = mysqli_real_escape_String($conn, $_POST["technical"]);
    $conclusion = mysqli_real_escape_String($conn, $_POST["conclusion"]);

    //check the form if empty
    if(empty($title) || empty($introduction) || empty($market) || empty($user) || empty($technical)|| empty($conclusion)) {
      
    } else {
        $sql = "INSERT INTO tbl_research(id, title, introduction,market,user,technical ,conclusion, archive) VALUES ('', '$title', '$introduction', '$market', '$user','$technical','$conclusion', 'false')";
        mysqli_query($conn, $sql);
      
    }
    
?>