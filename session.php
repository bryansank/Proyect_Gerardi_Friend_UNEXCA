<?php  

if(!empty($_SESSION['uid'])) {
    
    $session_uid=$_SESSION['uid'];

    include('class/userClass.php');
    include('class/productClass.php');

    $userClass = new userClass();
    $productClass = new Product();
}

if(empty($session_uid)) {
    $url=BASE_URL.'index.php';
    header("Location: $url");
}

?>