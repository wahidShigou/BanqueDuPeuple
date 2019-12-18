<?php
	include '../../../header.php';
?>
<h1>NOUVEAU COMPTE<h1/>

<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
	<p class="divider-text">
        <span class="bg-light">CLIENT</span>
    </p>
	<form  method="POST" action="compte" >
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="nom" class="form-control" placeholder="Nom" type="text">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="prenom" class="form-control" placeholder="Prenom" type="text">
    </div>
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-home"></i> </span>
		 </div>
        <input name="adresse" class="form-control" placeholder="Adresse" type="email">
    </div> 
     <div class="form-group input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-home"></i> </span>
         </div>
        <input name="tel" class="form-control" placeholder="Telephone" type="number">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-home"></i> </span>
         </div>
        <input name="cni" class="form-control" placeholder="cni" type="number">
    </div>
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
		</div>
        <!--
		<select class="custom-select" style="max-width: 120px;">
		    <option selected="">+971</option>
		    <option value="1">+972</option>
		    <option value="2">+198</option>
		    <option value="3">+701</option>
		</select>
    	<input name="" class="form-control" placeholder="Phone number" type="text">
    </div> <!-- form-group// -->
    <p class="divider-text">
        <span class="bg-light">COMPTE</span>
    </p>
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input class="form-control" name="numero" placeholder="NUMERO DE COMPTE" type="text">
    </div>
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-dollar"></i> </span>
		</div>
        <input class="form-control" name="solde" placeholder="SOLDE" type="number">
    </div>                             
    <div class="form-group">
        <button type="submit" name="compte" class="btn btn-success btn-block"> Create Account  </button>
    </div>                                                                 
</form>
</article>
</div> <!-- card.// -->

</div> 
<!--container end.//-->

 
<?php
	include '../../../footer.php';