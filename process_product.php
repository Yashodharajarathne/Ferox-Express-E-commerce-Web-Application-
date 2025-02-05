<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecomm";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $slug = $_POST['slug'];
    $price = $_POST['price'];
    $photo = $_FILES['photo']['name'];
    $counter = $_POST['counter'];

    // Auto-generate the date_view
    $date_view = date('Y-m-d H:i:s');

    // Upload photo to a directory (you may need to handle file upload security)
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);

    // SQL query to insert data
    $sql = "INSERT INTO products (category_id, name, description, slug, price, photo, date_view, counter)
            VALUES ('$category_id', '$name', '$description', '$slug', '$price', '$photo', '$date_view', '$counter')";

    if ($conn->query($sql) === TRUE) {
        $successMessage = "Product added successfully!";
    } else {
        $errorMessage = "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product - Ecommerce</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .container {
            max-width: 600px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            text-align: center;
        }

        h2 {
            color: #007bff;
            margin-bottom: 20px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        .return-btn {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .return-btn:hover {
            background-color: #0056b3;
            color: white;
            text-decoration: none;
        }

        .success-message {
            color: #28a745;
            font-weight: bold;
            margin-top: 10px;
        }

        .error-message {
            color: #dc3545;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add New Product</h2>
        
        <?php if (isset($successMessage)) : ?>
            <div class="success-message"><?php echo $successMessage; ?></div>
        <?php endif; ?>

        <?php if (isset($errorMessage)) : ?>
            <div class="error-message"><?php echo $errorMessage; ?></div>
        <?php endif; ?>

        <form action="Photo.php" method="post" enctype="multipart/form-data">
            <!-- Your form fields here -->
            <button type="submit">Add Product</button>
        </form>

        <a href="dashboard.php" class="return-btn">Return to Home</a>
    </div>
</body>
</html>
