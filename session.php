<?php  

if(!empty($_SESSION['username'])) {
    
    $session_uid=$_SESSION['username'];

    include('class/userClass.php');
    include('class/productClass.php');

    $userClass = new userClass();
    $productClass = new Product();
}

if(empty($session_uid)) {
    unset($_SESSION['username']);
    session_destroy();
    $url=BASE_URL.'index.php';
    header("Location: $url");
}

?>