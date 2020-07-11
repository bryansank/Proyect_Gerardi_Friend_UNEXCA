<?php 

    include('config.php');

    $_SESSION['uid']='';
    unset($GLOBALS['uid']);
    session_destroy();
    
    $session_uid='';

    

    if(empty($session_uid) && empty($_SESSION['uid'])){
        $url=BASE_URL.'index.php';
        header("Location: $url");
        //echo "";
    }

?>