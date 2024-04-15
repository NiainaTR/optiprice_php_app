<?php
    $nom = $_GET['name'];
    $taille = $_GET['taille'];
    $chambres = $_GET['price'];
    $price = $_GET['price'];
    $phone = $_GET['phone'];


    require('./dbh.ext.php');
    require_once('./function.php');

    $sql = "SELECT * FROM products";
    $result = mysqli_query($conn, $sql);
    $products = [];

    if ($result) {
        $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link href="./bootstrap.min.css" rel="stylesheet" />
<link href="./styles.css" rel="stylesheet" />
<title>Insert title here</title>
</head>
<body>

	<div class="card" style="width: 18rem;margin:5vw;">
	  <img class="card-img-top" src="./img.jpg" alt="..." />
        <div class="card-body">
	    <h5 class="card-title">Nom : <?php  echo $nom;?> </h5>
	    <p class="card-text">Taille : <?php  echo $taille;?> </p>
		<p class="card-text">Chambre(s) : <?php  echo $chambres;?> </p>
		<p class="card-text">Prix : <?php  echo $price;?>  Ariary</p>
		<p class="card-text">Téléphone : <?php  echo $phone;?> </p>
		
  		
  		<form action='./insertDB.php' method='post'>
  		<input type='hidden' name='name' value="<?php  echo $nom;?>"/>
   		<input type='hidden' name='taille' value="<?php  echo $taille;?>"/>
   		<input type='hidden' name='chambre' value="<?php  echo $chambres;?>"/>
   		<input type='hidden' name='price' value="<?php  echo $price;?>"/>
   		<input type='hidden'name='phone'  value=" <?php  echo $phone;?>"/>
  	 	<button type="submit" class="btn btn-primary mt-2">Confirmer la vente</button>
   		</form>
  	</div>
  	
  	<div class="card">
  <div class="card-header">
    Suggestion
  </div>
  <div class="card-body">
    <h5 class="card-title">On vous suggère un prix de : <?php  echo (int) predictPrice($products , $taille);?> Ariary pour ce produit</h5>
   	<form action='./insertDB.php' method='post'>
   		<input type='hidden' name='name' value="<?php  echo $nom;?>"/>
   		<input type='hidden' name='taille' value="<?php  echo $taille;?>"/>
   		<input type='hidden' name='chambre' value="<?php  echo $chambres;?>"/>
   		<input type='hidden' name='price' value="<?php  echo (int) predictPrice($products , $taille);?>"/>
   		<input type='hidden'name='phone'  value=" <?php  echo $phone;?>"/>
   		<button type="submit" class="btn btn-primary">J'accepte</button>
   	</form>
  </div>
</div>
</div>
</body>
</html>
