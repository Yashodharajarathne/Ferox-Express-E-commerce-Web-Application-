<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="\ferox_express\store\images\logo22.jpeg" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ferox Express - Add New Products</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Fredoka', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #fff; /* White background */
            margin: 0;
            padding: 0;
            display: flex;
            min-height: 100vh;
            color: #000; /* Black text */
        }

        .sidebar {
            width: 250px;
            background-color: #000; /* Black sidebar */
            color: #fff; /* White text */
            padding-top: 20px;
            position: relative;
        }

        .brand {
            text-align: center;
            font-size: 20px;
            margin-bottom: 20px;
            color: #fff; /* White brand text */
        }

        .menu-item {
            padding: 15px;
            text-decoration: none;
            display: block;
            margin-bottom: 5px;
            transition: background-color 0.3s ease;
            background-color: #333; /* Dark gray */
            color: #fff; /* White text */
        }

        .menu-item:hover {
            background-color: #555; /* Slightly lighter gray on hover */
            color: #fff;
            text-decoration: none;
        }

        .content {
            flex: 1;
            padding: 20px;
        }

        .profile-section {
            text-align: right;
            position: absolute;
            top: 0;
            right: 0;
            margin: 10px;
        }

        .profile-photo {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #3498db;
            overflow: hidden;
            cursor: pointer;
        }

        .profile-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .logout-btn {
            display: none;
            background-color: #e74c3c;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 5px;
            transition: background-color 0.3s ease;
        }

        .logout-btn:hover {
            background-color: #c0392b;
        }

        .note {
            background-color: #ecf0f1;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            color: #000; /* Black text */
        }

        h2 {
            color: #000e17;
            font-family: 'Raider Crusader Italic';
        }

        /* Additional style for the add new products page */
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        label {
            margin-bottom: 10px;
            display: block;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="sidebar">
        <div class="brand">DASHBOARD <br><img src="images/logo1.png" alt="" width="100" height="90" style="margin-top: 5px;"></div>
        <a href="dashboard.php" class="menu-item"> Home</a>
        <a href="photo.php" class="menu-item">Add New products</a>
        <a href="admindelete.php" class="menu-item">Update and Delete products</a>
        <a href="msg.php" class="menu-item"> Customer Messages</a>
    </div>

    
    <div class="content">
        <div class="profile-section">
            <div class="profile-photo" onclick="toggleLogout()">
                <!-- Placeholder for profile photo -->
                <img src="images/ft.jpeg" alt="Profile Photo">
            </div>
            <button class="logout-btn" onclick="logout()">Logout</button>
        </div>


        <br>
        <br>


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

// Handle product deletion
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $productIdToDelete = $_GET['delete'];
    $deleteQuery = "DELETE FROM products WHERE id = $productIdToDelete";
    $conn->query($deleteQuery);
}

// Handle product update
$updateSuccessMessage = '';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $productIdToUpdate = $_POST['product_id'];
    $updatedName = $_POST['updated_name'];
    $updatedDescription = $_POST['updated_description'];
    $updatedPrice = $_POST['updated_price'];

    $updateQuery = "UPDATE products SET name='$updatedName', description='$updatedDescription', price='$updatedPrice' WHERE id=$productIdToUpdate";
    if ($conn->query($updateQuery) === TRUE) {
        $updateSuccessMessage = "Product updated successfully!";
    } else {
        echo "Error updating product: " . $conn->error;
    }
}

// Fetch products from the database
$selectQuery = "SELECT id, category_id, name, description, slug, price, photo, date_view, counter FROM products";
$result = $conn->query($selectQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management - Ecommerce</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            
        }

        h2 {
            color: #343a40;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #dee2e6;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #343a40;
            color: #fff;
        }

     

        .delete-btn, .update-btn {
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .delete-btn:hover {
            background-color: #dc3545;
        }
        .delete-btn {
            background-color: red;
        }

        .delete-btn:hover {
    background-color: darkred;
    color: #fff;
    text-decoration: none; /* Remove underline on hover */
}

        .update-btn {
            background-color: #28a745;
        }

        .update-btn:hover {
            background-color: #218838;
        }

        .success-message {
            color: #28a745;
            font-weight: bold;
            margin-top: 10px;
        }

        .return-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #343a40;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            margin-top: 20px;
        }

        .return-btn:hover {
            background-color: #1d2124;
        }
    </style>
</head>
<body>

    <h2>Product Management</h2>

    <?php if (!empty($updateSuccessMessage)) : ?>
        <div class="success-message"><?php echo $updateSuccessMessage; ?></div>
    <?php endif; ?>

    <!-- Display products in a table -->
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Category ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Photo</th>
                <th>Date View</th>
                <th>Counter</th>
                <th>Action</th>
                <th>Update</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['category_id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['description'] . "</td>";
                    echo "<td>" . $row['price'] . "</td>";
                    echo "<td><img src='" . $row['photo'] . "'></td>";
                    echo "<td>" . $row['date_view'] . "</td>";
                    echo "<td>" . $row['counter'] . "</td>";
                    echo "<td><a href='?delete=" . $row['id'] . "' class='delete-btn'>Delete</a></td>";
                    echo "<td><button class='update-btn' data-toggle='modal' data-target='#updateModal" . $row['id'] . "'>Update</button></td>";
                    echo "</tr>";

                    // Update Modal for each product
                    echo "<div class='modal fade' id='updateModal" . $row['id'] . "' tabindex='-1' role='dialog' aria-labelledby='updateModalLabel' aria-hidden='true'>";
                    echo "<div class='modal-dialog' role='document'>";
                    echo "<div class='modal-content'>";
                    echo "<div class='modal-header'>";
                    echo "<h5 class='modal-title' id='updateModalLabel'>Update Product</h5>";
                    echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                    echo "<span aria-hidden='true'>&times;</span>";
                    echo "</button>";
                    echo "</div>";
                    echo "<div class='modal-body'>";
                    echo "<form action='?update' method='post'>";
                    echo "<input type='hidden' name='product_id' value='" . $row['id'] . "'>";
                    echo "<div class='form-group'>";
                    echo "<label for='updated_name'>Name:</label>";
                    echo "<input type='text' class='form-control' name='updated_name' value='" . $row['name'] . "' required>";
                    echo "</div>";
                    echo "<div class='form-group'>";
                    echo "<label for='updated_description'>Description:</label>";
                    echo "<input type='text' class='form-control' name='updated_description' value='" . $row['description'] . "' required>";
                    echo "</div>";
                    echo "<div class='form-group'>";
                    echo "<label for='updated_price'>Price:</label>";
                    echo "<input type='text' class='form-control' name='updated_price' value='" . $row['price'] . "' required>";
                    echo "</div>";
                    echo "<button type='submit' name='update' class='btn btn-primary'>Update Product</button>";
                    echo "</form>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<tr><td colspan='10'>No products found</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <a href="dashboard.php" class="return-btn">Return to Home</a>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php
$conn->close();
?>
    <script>
        function toggleLogout() {
            var logoutBtn = document.querySelector('.logout-btn');
            logoutBtn.style.display = (logoutBtn.style.display === 'block') ? 'none' : 'block';
        }

        function logout() {
            sessionStorage.clear();
            window.location.href = 'welcome.php';
        }
    </script>
</body>
</html>