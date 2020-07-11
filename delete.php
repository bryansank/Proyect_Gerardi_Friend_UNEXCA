<?php 

    include('config.php');
    include('session.php');

    $id_get = $_GET['id'];
    $id = (int)$id_get;

    $objDeleteProduct = $productClass->deleteProduct($id);

    if($objDeleteProduct){
        $url=BASE_URL.'productsAdmin.php';
        header("Location: $url");
    }else{
        $url=BASE_URL.'error.php';
        header("Location: $url");
    }

?>