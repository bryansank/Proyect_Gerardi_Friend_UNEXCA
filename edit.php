<?php 

    include('config.php');
    include('session.php');

    $errorUpdate='';

    $id_get = $_GET['id'];
    $id = (int)$id_get;

    $objEditProduct = $productClass->editProduct($id);

    if($objEditProduct){
        $name_product = $objEditProduct->name_product;
        $type_product = $objEditProduct->type_product;
        $price_product = $objEditProduct->price_product;
    }else{
        echo "Hubo un problema comuniquese con el administrador";
    }

    if(!empty($_POST['submitUpdateProduct'])){
        $updateName_product = $_POST['UpdateNameProduct'];
        $updateType_product = $_POST['UpdateTypeProduct'];
        $updatePrice_product = $_POST['UpdatePriceProduct'];

        if( strlen(trim($updateName_product)) > 1 && strlen(trim($updateType_product))>1 ){

            $objUpdate = $productClass->updateProduct($id,$updateName_product,$updateType_product,$updatePrice_product);

            if($objUpdate){
				echo "<div><h2 style='border:1px solid green;'>Se actualizo su producto con Exito</h2></div>";
                //header('Refresh: 3');
			}
			else{
				$errorUpdate="Por favor, revisa el formulario.";
				//echo "eeeeey entro en else";
			}
        }else{
            $errorUpdate = "Verifique el formulario";
        }

        

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>

    <div id="container-login">
		<h3>Actuliza el producto</h3>
		<form method="post" action="" name="updateProduct">

			<label for="inputUpdateNameProduct">Nombre del Producto</label>
			<input value="<?php echo $name_product; ?>" id="inputUpdateNameProduct" type="text" name="UpdateNameProduct" />

            <label for="inputUpdateTypeProduct">Tipo del Product</label>
			<input value="<?php echo $type_product; ?>" id="inputUpdateTypeProduct" type="text" name="UpdateTypeProduct" />

            <label for="inputUpdatePriceProduct">Precio del Producto</label>
			<input value="<?php echo $price_product; ?>" id="inputUpdatePriceProduct" type="number" name="UpdatePriceProduct" />
			
			<div class="errorMsg"><?php echo $errorUpdate; ?></div>
			<input id="btnUpdateProduct" type="submit" class="button" name="submitUpdateProduct" value="Actualizar" />
            <a href="productsAdmin.php">Volver a ver Productos</a>
		</form>
	</div>

</body>
</html>