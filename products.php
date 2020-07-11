
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
    <a href="home.php">Volver al inicio</a>
    <h1>Disfruta de Nuestros productos</h1>
    <table>
        <thead style="border: 2px solid red;">
            <th width="18%">id</th>
            <th width="22%">Producto</th>
            <th width="22%">Tipo de Producto</th>
            <th width="14%">Precio</th>
        </thead>
        <tbody>
        <?php
            if($product){ 
                foreach($product as $result) { 
                    echo "
                    <tr>
                        <td>". $result -> id ."</td>
                        <td>". $result -> name_product ."</td>
                        <td>". $result -> type_product ."</td>
                        <td>". $result -> price_product ."</td>
                    </tr>
                    ";
                }
            }else{
                echo "<tr>
                        <td>"."Verifique la conexion a internet"."</td>
                        <td>"."Verifique la conexion a internet"."</td>
                        <td>"."Verifique la conexion a internet"."</td>
                        <td>"."Verifique la conexion a internet"."</td>
                    </tr>";
            }
        ?>
        </tbody>
    </table>

</body>
</html>
<!--todo: probar el escape de slah en js-->