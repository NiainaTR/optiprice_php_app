<?php
    require('./dbh.ext.php');

    $sql = "SELECT * FROM products";
    $result = mysqli_query($conn, $sql);
    $products = [];

    if ($result) {
        $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>OPTIPRICE</title>
    <link href="./styles.css" rel="stylesheet" />
</head>
<body>
    <!-- ... Votre en-tête ici ... -->
    <header class="bg-dark py-2" style="height: 60vh;">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white" style="display: flex;flex-direction: column; align-items: center; justify-content: center;">
                    <h1 class="display-4 fw-bolder" style="letter-spacing: 10px;">OPTIPRICE</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Optiprice est une plateforme qui optimise votre vente sur l'immobilier.</p>
                	<a class="btn btn-primary" href="./insert.html" style="margin-top:20px">Ajouter votre annonce</a>
                </div>
                
            </div>
            
        </header>
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php foreach($products as $pro){ ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                         <img class="card-img-top" src="./img.jpg" alt="..." />   
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Afficher les détails du produit -->
                                    <h5 class="fw-bolder"><?php echo $pro['name']; ?></h5>
                                    <p>Taille : <?php echo $pro['taille']; ?></p>
                                    <p>Chambres : <?php echo $pro['chambres']; ?></p>
                                    <p>Prix : <?php echo $pro['price']; ?></p>
                                    <p>Téléphone : <?php echo $pro['phone']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <!-- ... Votre pied de page ici ... -->

    <!-- Bootstrap core JS-->
    <script src="./bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="./scripts.js"></script>
</body>
</html>
