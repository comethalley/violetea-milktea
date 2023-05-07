<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <title>PDIS | Form</title>
</head>
<body>

    <form action="includes/form-function.php" method="POST">
        
    <input type="text" name="user" placeholder="Username" required><br>
    <input type="text" name="subject" placeholder="Subject" required><br>
    <textarea name="body" placeholder="Body" required></textarea><br>
    <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>