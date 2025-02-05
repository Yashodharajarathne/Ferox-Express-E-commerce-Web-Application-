

<div class="row">
	<div class="box box-solid">
	  	<div class="box-header with-border">
	    	<h3 class="box-title"><b>Most Viewed Today</b></h3>
	  	</div>
	  	<div class="box-body">
	  		<ul id="trendin">
	  		<?php
	  			$now = date('Y-m-d');
	  			$conn = $pdo->open();

	  			$stmt = $conn->prepare("SELECT * FROM products WHERE date_view=:now ORDER BY counter DESC LIMIT 10");
	  			$stmt->execute(['now'=>$now]);
	  			foreach($stmt as $row){
	  				echo "<li><a href='product.php?product=".$row['slug']."'>".$row['name']."</a></li>";
	  			}

	  			$pdo->close();
	  		?>
	    	<ul>
	  	</div>
	</div>
</div>

<div class="row">
	<div class="box box-solid">
	  	<div class="box-header with-border">
	    	<h3 class="box-title"><b>Become a Subscriber</b></h3>
	  	</div>
	  	<div class="box-body">
	    	<p>Get free updates on the latest products and discounts, straight to your inbox.</p>
			<form method="POST" action="">
    <div class="input-group">
	<p style="font-size: 19px;"><b>077 2531762</b></p>

        <span class="input-group-btn">
            <a href="https://chat.whatsapp.com/J7x7ePk3ChaGUSm5ZsMsSZ" target="_blank" class="btn btn-info btn-flat"style="background-color:green;">
                <i class="fa fa-whatsapp"></i> Join Chat
            </a>
        </span>
    </div>
</form>

	  	</div>
	</div>
</div>

<div class="row">
	<div class='box box-solid'>
	  	<div class='box-header with-border'>
	    	<h3 class='box-title'><b>Follow us on Social Media</b></h3>
	  	</div>
		  <div class='box-body'>
		  <a href="https://www.facebook.com/" class="btn btn-social-icon btn-facebook" target="_blank" style="background-color: white; color: blue; border: none;"><i class="fa fa-facebook"></i></a>
          <a href="https://plus.google.com/" class="btn btn-social-icon btn-google" target="_blank" style="background-color: white; color: red; border: none;"><i class="fa fa-instagram"></i></a>
         <a href="#" class="btn btn-social-icon btn-linkedin" target="_blank" style="background-color: white; color: green; border: none;"><i class="fa fa-whatsapp"></i></a>
		

</div>


	</div>
</div>
