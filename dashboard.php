<link rel="icon" href="\ferox_express\store\images\logo22.jpeg" type="image/x-icon">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ferox Express</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Chartist.js -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Fredoka&display=swap');
        @import url('https://fonts.cdnfonts.com/css/raider-crusader');
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

        .ct-chart {
            max-width: 100%;
            height: auto;
        }

        h2 {
            color: #000e17;
            font-family: 'Raider Crusader Italic';
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

        <strong>&copy; DEVELOPED BY <img src="images/key.png" alt="" width="100" height="90" > 2023</strong>        
        <br>
        <br>
        <br>
        
               

        <div class="row">
            <div class="col-md-6">
                <div class="note">
                    <h4>Recent Profits</h4>
                    <canvas id="bookingChart"></canvas>
                </div>
            </div>
            <div class="col-md-6">
                <div class="note">
                    <h4>New Customers</h4>
                    <div class="ct-chart ct-golden-section" id="paymentChart"></div>
                </div>
            </div>
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

        // Sample data for charts
        var bookingData = {
            labels: ['Monday', 'Tuesday', 'Wednessday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
            datasets: [{
                label: 'Profit',
                backgroundColor: '#3498db',
                borderColor: '#3498db',
                data: [12, 19, 13, 15, 5,18,13]
            }]
        };

        var paymentData = {
            labels: ['January', 'February', 'March', 'April', 'May'],
            series: [[1000, 1200, 800, 1500, 2000]]
        };

        // Chart.js for Recent Bookings
        var bookingChart = new Chart(document.getElementById('bookingChart'), {
            type: 'bar',
            data: bookingData,
            options: {
                legend: {
                    display: false
                }
            }
        });

        // Chartist.js for Payment Overview
        new Chartist.Line('#paymentChart', paymentData, {
            showPoint: true,
            lineSmooth: false,
            fullWidth: true,
            chartPadding: {
                right: 20
            },
            axisY: {
                onlyInteger: true,
                offset: 20
            }
        });
    </script>
    
</body>
</html>
