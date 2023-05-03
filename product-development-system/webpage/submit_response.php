
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="./css/suggestion.css">
</head>
<body>
<?php
// Connect to the database
include_once '../webpage/includes/db-connection.php';

// Get the survey response and name from the form submission
$name = mysqli_real_escape_string($conn, $_POST["name"]);
$conceptID = mysqli_real_escape_string($conn, $_POST["conceptID"]);

// Loop through all the question IDs and insert the responses into the database
foreach ($_POST as $key => $value) {
  if ($key != "name" && $key != "conceptID" && $key != "submit") {
    if (is_numeric($key) && $key > 0) { // Check if $key is numeric and greater than 0
      $question_id = mysqli_real_escape_string($conn, $key);
      $response = mysqli_real_escape_string($conn, $value);

      // Insert the response and name into the database
      $sql = "INSERT INTO tbl_surveys (id, username, question_id, response, archive, conceptID) VALUES ('', '$name', '$question_id', '$response', 'false', '$conceptID')";
      if (!mysqli_query($conn, $sql)) {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    }
  }
}

// Close database connection
mysqli_close($conn);

// Set success message
$message = "Submitted successfully.";

// Alert the user with SweetAlert2
echo "<script>
Swal.fire({
  title: 'Success!',
  text: '$message',
  icon: 'success',
  confirmButtonText: 'OK'
}).then((result) => {
  if (result.isConfirmed) {
    // Redirect back to index page with success message
    window.location.href = 'product-concept.php?message=' + encodeURIComponent('$message');
  }
});
</script>";

?>

</body>
</html>
