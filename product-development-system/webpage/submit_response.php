<?php
// Connect to the database
include_once '../webpage/includes/db-connection.php';

// Get the survey response and name from the form submission
$response1 = mysqli_real_escape_String($conn, $_POST["response1"]);
$response2 = mysqli_real_escape_String($conn, $_POST["response2"]);
$response3 = mysqli_real_escape_String($conn, $_POST["response3"]);
$name = mysqli_real_escape_String($conn, $_POST["name"]);
$conceptID = mysqli_real_escape_String($conn, $_POST["conceptID"]);

// Insert the response and name into the database
$sql = "INSERT INTO tbl_survey (username, response1, response2, response3, archive, conceptID) VALUES ('$name','$response1','$response2','$response3', 'false','$conceptID')";
if (mysqli_query($conn, $sql)) {
  // Close database connection
  mysqli_close($conn);

  // Set success message
  $message = "Submitted successfully.";

  // Redirect back to index page with success message
  header("Location: success-submit.php?message=" . urlencode($message));
  exit;
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);
?>