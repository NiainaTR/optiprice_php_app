<?php
    $nom = $_POST['name'];
    $taille = $_POST['taille'];
    $chambres = $_POST['chambre'];
    $price = $_POST['price'];
    $phone = $_POST['phone'];

    $servername = "localhost";
    $dbusername = "root";
    $dbpwd = "";
    $dbname = "optiprice";

    $conn = mysqli_connect($servername , $dbusername , $dbpwd , $dbname);
    
    if(!$conn){
        die("Connection Failed ! ".mysqli_connect_error());
    }

    $stmt = $conn->prepare("INSERT INTO products (name, taille, chambres, price, phone) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("siiis", $nom, $taille, $chambres, $price, $phone);

    if ($stmt->execute()) {
        echo "insert succès";
        header('Location: ./index.php');
    } else {
        echo "Erreur: " . $stmt->error;
    }

?>


