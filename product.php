<?php

require_once "vendor\autoload.php";

use App\Model\Clothing;
use App\Model\Electronic;


if (isset($_GET['id_product']) && isset($_GET['product_type'])) {

    $idProduct = intval($_GET['id_product']);
    $productType = $_GET['product_type'];

    
    if ($idProduct > 0) {

        $dbConnection = getDbConnection();

       
        if ($productType === 'electronic') {
            $productModel = new Electronic($dbConnection);
        } elseif ($productType === 'clothing') {
            $productModel = new Clothing($dbConnection);
        } else {
            die('Type de produit non pris en charge');
        }

    
        $product = $productModel->getProductById($idProduct);


        if ($product) {
          
            echo "<h1>Détails du produit</h1>";
            echo "<p>Nom: " . $product['name'] . "</p>";
            echo "<p>Description: " . $product['description'] . "</p>";
            echo "<p>Prix: " . $product['price'] . "</p>";
   
        } else {
      
            echo "<p>Le produit demandé n'est pas disponible.</p>";
        }
    } else {
        
        echo "<p>Paramètre 'id_product' invalide.</p>";
    }
} else {
  
    echo "<p>Les paramètres 'id_product' et 'product_type' sont nécessaires dans l'URL.</p>";
}
?>

