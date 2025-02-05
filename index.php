<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue layout-top-nav" >


<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
		  

	      <section class="content">
		  

	        <div class="row">
	        	<div class="col-sm-9">
	        		<?php
	        			if(isset($_SESSION['error'])){
	        				echo "
	        					<div class='alert alert-danger'>
	        						".$_SESSION['error']."
	        					</div>
	        				";
	        				unset($_SESSION['error']);
	        			}
	        		?>
	        		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		                <ol class="carousel-indicators">
		                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		                  <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
		                  <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
		                </ol>
		                <div class="carousel-inner">
    <div class="item active">
      <img src="images/n5.jpeg" alt="First slide">
    </div>
    <!-- Slide 2 -->
    <div class="item">
      <img src="images/n5.jpeg" alt="Second slide">
    </div>
    <!-- Slide 3 -->
    <div class="item">
      <img src="images/n5.jpeg" alt="Third slide">
    </div>
    <!-- Slide 4 (New) -->
    <div class="item">
      <img src="images/n5.jpeg" alt="Fourth slide">
    </div>
    
  </div>
  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
    <span class="fa fa-angle-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
    <span class="fa fa-angle-right"></span>
  </a>
</div>
<br>
<br>
<br>
<style>
	@import url('https://fonts.googleapis.com/css2?family=Fredoka&display=swap');
  form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
</style>



		            
<?php
    $conn = $pdo->open();

    try {
        $stmt = $conn->prepare("SELECT *, SUM(quantity) AS total_qty FROM details LEFT JOIN sales ON sales.id=details.sales_id LEFT JOIN products ON products.id=details.product_id GROUP BY details.product_id ORDER BY total_qty DESC");
        $stmt->execute();

        foreach ($stmt as $row) {
            $image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';

            echo "
                <div class='col-sm-4'>
                    <div class='box box-solid'>
                    <a href='product.php?product=" . $row['slug'] . "'>
                        <div class='box-body prod-body'>
                            <img src='".$image."' width='100%' height='230px' class='thumbnail'>
                            <h5><a href='product.php?product=".$row['slug']."'>".$row['name']."</a></h5>
                        </div>
                        <div class='box-footer'>
                            <b>LKR ".number_format($row['price'], 2)."</b>
                        </div>
                    </div>
                </div>
            ";
        }
    } catch (PDOException $e) {
        echo "There is some problem in connection: " . $e->getMessage();
    }

    $pdo->close();
?>

					
	        	</div>
	        	<div class="col-sm-3">
	        		<?php include 'includes/sidebar.php'; ?>
	        	</div>

            <style>
    .img-container {
        padding: 30px; /* Adjust the padding as needed */
    }

    .img {
        filter: saturate(0) brightness(1);
        transition: filter 0.3s ease; /* Add a smooth transition effect */
    }

    .img:hover {
        filter: saturate(1) brightness(1);
    }
</style>

<div class="img-container">
    
    <img src="images/sam.png" alt="" class="img" width="250" height="60">
    <br><br><br> 
    <img src="images/goog.png" alt="" class="img" width="250" height="97">
    <br><br><br>
    <img src="images/1.png" alt="" class="img" width="250" height="100">
    <br><br><br>
    <img src="images/5.png" alt="" class="img" width="250" height="100">
    <br><br><br>
    <img src="images/3.png" alt="" class="img" width="250" height="100">
    <br><br><br>
        <img src="images/4.png" alt="" class="img" width="250" height="100">
    <br><br><br>
           <img src="images/6.png" alt="" class="img" width="250" height="100">
    <br><br><br>
    <img src="images/7.png" alt="" class="img" width="250" height="100">
    <br><br><br>
    <img src="images/8.png" alt="" class="img" width="250" height="100">
    <br><br><br>
    <img src="images/9.png" alt="" class="img" width="250" height="100">
    <br><br><br>
    <img src="images/10.png" alt="" class="img" width="250" height="100">
    <br><br><br>
    <img src="images/11.png" alt="" class="img" width="250" height="100">
    <br><br><br>
    <img src="images/12.png" alt="" class="img" width="250" height="100">
    <br><br><br>
    <img src="images/13.png" alt="" class="img" width="250" height="100">
    <br><br><br>
    <img src="images/14.png" alt="" class="img" width="250" height="100">
    <br><br><br>
    <img src="images/15.png" alt="" class="img" width="250" height="100">
    
    
</div>


</div>


          </div>
          
	      </section>
	     
	    </div>
	  </div>
  
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>