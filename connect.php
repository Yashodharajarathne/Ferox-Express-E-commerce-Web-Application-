<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Confirmation</title>
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
            max-width: 400px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            text-align: center;
        }

        .success-message {
            color: #28a745; /* Success text color */
            font-size: 18px;
            margin-bottom: 20px;
        }

        .reassurance {
            color: #333;
            font-size: 16px;
            margin-bottom: 30px;
        }

        .return-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff; /* Button color */
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .return-btn:hover {
            background-color: #0056b3; /* Hover state color */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="success-message">Message Sent Successfully!</div>
        <div class="reassurance">Ferox Express will reply to you soon.</div>
        <a href="index.php" class="return-btn">Return to Home</a>
    </div>

    <?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'ecomm');

    if ($conn->connect_error) {
        echo "$conn->connect_error";
        die("Connection Failed: " . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO contact(name, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $message);

        $execVal = $stmt->execute();
        
        if ($execVal) {
            echo '<script>alert("Message sent successfully!");</script>';
        } else {
            echo '<script>alert("Error: ' . $stmt->error . '");</script>';
        }

        $stmt->close();
        $conn->close();
    }
?>

 

</body>
</html>