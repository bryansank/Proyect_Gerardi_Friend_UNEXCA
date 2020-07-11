
<?php 

    include('config.php');
    include('session.php');

    $product = $productClass->getProducts();

    if (!empty($_POST['btnProductInsertSubmit'])) {

        $NameProductInsert = $_POST['NameProduct'];
		$TypeProductInsert = $_POST['TypeProduct'];
		$PriceProductInsert = $_POST['PriceProduct'];

        $NameProduct_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $NameProductInsert);
        $TypeProduct_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $TypeProductInsert);
        $PriceProduct_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $PriceProductInsert);

		if($NameProduct_check && $TypeProduct_check && $PriceProduct_check && strlen(trim($NameProductInsert))>0 && strlen(trim($TypeProductInsert))>0) {

			$objProduct = $productClass->insertNewProduct($NameProductInsert,$TypeProductInsert,$PriceProductInsert);

			if($objProduct){
				echo "<div><h2 style='border:1px solid green;'>Nuevo producto agregado con Exito </h2></div>";
			}else{
				echo "<div> <h2 style='border:1px solid red;'>No se pueden agregar datos, comuníquese con el administrador</h2> </div>";
			}
		}else{
            echo "<div> <h2 style='border:1px solid red;'>Complete bien el formulario</h2> </div>";
		}
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto</title>
</head>
<body>


    <div> 
        <h1>Añade un Producto Nuevo</h1>
        <form name="signup" action="" method="POST">

            <div>
                <div>
                    <label for="inputNameProduct">Nombre del Producto</label>
                    <input id="inputNameProduct" name="NameProduct" type="text" placeholder="Nombre del Producto">
                </div>
                <div>
                    <label for="inputTypeProduct">Tipo de producto</label>
                    <input id="inputTypeProduct" name="TypeProduct" type="text" placeholder="Tipo del Producto">
                </div>
                <div>
                    <label for="inputPriceProduct">Precio de producto</label>
                    <input id="inputPriceProduct" name="PriceProduct" type="number" placeholder="Precio del Producto">
                </div>
            </div>

            <div>
                <input id="btnProductInsertSubmit" type="submit" name="btnProductInsertSubmit" value="Nuevo Producto">
            </div>
        </form>
    </div>

    <br />
    <br />
    <br />

    <table>
        <thead style="border: 2px solid red;">
            <th width="18%">id</th>
            <th width="22%">Producto</th>
            <th width="22%">Tipo de Producto</th>
            <th width="14%">Precio</th>
            <th width="13%" colspan="2"></th>
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