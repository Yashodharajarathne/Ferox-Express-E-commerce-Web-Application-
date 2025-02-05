<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav" >
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">
        <style>
             @import url('https://fonts.googleapis.com/css2?family=Fredoka&display=swap');
       
             <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-ZVJU7rHXP7Whjo4BOLLeWPA4FdTbDI2azfjGcDtm8OW8Mv8P+0uVkrR2lYWSs1t" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Fredoka&display=swap');

        body {
            font-family: 'Fredoka', sans-serif;
            background-color: #f4f4f4;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-top: 30px;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input,
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        .btn-submit {
            padding: 10px 20px;
            border: 1px solid #333;
            border-radius: 50px;
            text-decoration: none;
            color: #333;
            transition: background-color 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #333;
            color: #fff;
        }

        /* Map */
        .map {
            margin-top: 40px;
            border-radius: 10px;
            overflow: hidden;
        }

        .map iframe {
            width: 100%;
            height: 450px;
            border: none;
        }
    </style>
</head>

<body class="hold-transition skin-blue layout-top-nav">
    <div class="container">
        <h1>Contact Us</h1>

        <form class="form" action="connect.php" method="post">
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name" class="form-control" required>

            <label for="email">Your Email:</label>
            <input type="email" id="email" name="email" class="form-control" required>

            <label for="message">Your Message:</label>
            <textarea id="message" name="message" rows="6" class="form-control" required></textarea>

            <button class="btn btn-submit" type="submit">Submit</button>
        </form>

        <!-- Map -->
        <div class="map mt-4">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.6318089203114!2d80.36881867476292!3d7.505835692506723!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae339bfc74b8d39%3A0x2d908a3b2da2557!2sFerox%20Express!5e0!3m2!1sen!2slk!4v1712730550151!5m2!1sen!2slk"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <br>
    </div>
    

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>

	     
	    </div>
	  </div>
  
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>

</body>
</html>