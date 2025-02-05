<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="\ferox_express\store\images\logo22.jpeg" type="image/x-icon">
    <title>Ferox Express</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Fredoka', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            min-height: 100vh;
            color: #000;
        }

        .sidebar {
            width: 250px;
            background-color: #000;
            color: #fff;
            padding-top: 20px;
            position: relative;
        }

        .brand {
            text-align: center;
            font-size: 20px;
            margin-bottom: 20px;
            color: #fff;
        }

        .menu-item {
            padding: 15px;
            text-decoration: none;
            display: block;
            margin-bottom: 5px;
            transition: background-color 0.3s ease;
            background-color: #333;
            color: #fff;
        }

        .menu-item:hover {
            background-color: #555;
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

        .view-messages {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            color: #000;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
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


        <div class="view-messages">
            <h2>Customer Messages</h2>

            <?php
            // Include your database connection file here

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "ecomm";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM contact";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo '<table>';
                echo '<tr><th>ID</th><th>Name</th><th>Email</th><th>Message</th><th>Created At</th></tr>';
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['id'] . '</td>';
                    echo '<td>' . $row['name'] . '</td>';
                    echo '<td>' . $row['email'] . '</td>';
                    echo '<td>' . $row['message'] . '</td>';
                    echo '<td>' . $row['created_at'] . '</td>';
                    echo '</tr>';
                }
                echo '</table>';
            } else {
                echo 'No messages found.';
            }

            $conn->close();
            ?>
        </div>
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
