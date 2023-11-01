<?php
// página onde foi criado o formulário para o endereço de entrega
session_start();

include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");

?>
  <!-- MAIN -->
  <main>
    <!-- HERO -->
    <div class="nero">
      <div class="nero__heading">
        <span class="nero__bold">Entrega</span>
      </div>
      <p class="nero__text">
      </p>
    </div>
  </main>

<div id="content"><!-- content Starts -->

<div class="container"><!-- container Starts -->


<div class="col-md-2"><!-- col-md-3 Starts -->



</div><!-- col-md-2 Ends -->

<div class="col-md-9"><!-- col-md-9 Starts -->

<div class="box"><!-- box Starts -->

<div class="tab-content" ><!-- tab-content Starts -->

<div class="container-shipping">
		
		<div class="form">
			<form class="form-shipping">	
				<div class="shipping">
					<h3>Endereço de entrega</h3>
				
				<div class="row1">
					<div class="first-name"><label class="label-shipping" for="">Nome</label><input class="input-shipping" type="text"></div>
					<div class="last-name"><label class="label-shipping" for="">Sobrenome</label><input class="input-shipping" type="text"></div>
				</div>
				
				<div class="row2">
					<div class="address"><label class="label-shipping"for="">Endereço</label><input class="input-shipping" type="text"></div>
					<div class="postal-code"><label class="label-shipping" for="">CEP</label><input class="input-shipping" type="text"></div>
				</div>
				
				<div class="row3">
					<div class="city"><label class="label-shipping" for="">Cidade</label><input class="input-shipping" type="text"></div>
					<div class="city"><label class="label-shipping" for="">Estado</label><input class="input-shipping" type="text"></div>
				</div>
			</div>
			
		<div class="row5">
			<div class="button">
				<button><a href="cart.php" style="text-decoration:none; color:white;">< Voltar</a></button>
			</div>
			<div class="button">
				<button><a href="checkout.php" style="text-decoration:none; color:white;">Check-In ></a></button>
			</div>
		</div>
	</form>
	</div>
	</div>

</div><!-- tab-content Ends -->

</div><!-- box Ends -->


</div><!-- col-md-9 Ends -->

</div><!-- container Ends -->

</div><!-- content Ends -->

<?php

include("includes/footer.php");

?>

<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>

</body>
</html>
