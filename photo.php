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

        <!-- Form to add a new product -->
        <form action="process_product.php" method="post" enctype="multipart/form-data">
    <label for="category_id">Select Category:</label>
    <select name="category_id" required>
        <option value="1"> Mobile Phones</option>
        <option value="2">Mobile Accessories</option>
        <option value="3">Smart Devices</option>
        <option value="4">Head Phones & Earphones</option>
        <option value="5">Storage Devices</option>
        <option value="6">Mobile Spare Parts</option>
        <option value="7">Mobile Repair ToolKits</option>
        <option value="8">Laptops</option>
        <option value="9">Computer Accessories</option>
        <option value="10">CCTV</option>
        <option value="11">Home & Garden</option>
        <option value="12">Sports & Games</option>
        <option value="13">Stationeries</option>
        <option value="14">Other Accessories</option>
        
        <!-- Add more categories as needed -->
    </select>

    <label for="name">Product Name:</label>
    <input type="text" name="name" required>

    <label for="description">Product Description:</label>
<textarea name="description" rows="4" style="width: 100%;" required></textarea>


    <label for="slug">Slug:</label>
    <input type="text" name="slug" required>

    <label for="price">Product Price:</label>
    <input type="number" name="price" required>

    <label for="photo">Product Photo:</label>
    <input type="file" name="photo" accept="image/*" required>

    <label for="counter">Counter:</label>
    <input type="number" name="counter" required>

    <button type="submit">Add Product</button>
</form>
    </div>

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
