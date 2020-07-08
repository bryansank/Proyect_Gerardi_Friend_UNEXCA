
<?php 

    include('config.php');
    include('session.php');

    $product = $productClass->getProducts();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto</title>
</head>
<body>
    <?php print_r($product); ?>
    <?php  ?>
</body>
</html>