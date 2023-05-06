<?php
session_start();
include('include/config.php');
if(isset($_GET['del']))
		  {
		          mysqli_query($con,"update tbl_employee set isArchived ='true' where id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Account deleted !!";
                  header("Location: employee-list.php?submit=success");
		  }

?>