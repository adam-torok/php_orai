<?php
    session_start(); //munkamenet követése miatt
    
    require_once('config/connect.php'); //adatbázishoz csatlakozunk
    echo file_get_contents("html/header.html");
    
    if (isset($_SESSION['user']) && (!empty($_SESSION['user']))){
               //Valaki be van jelentkezve
               echo file_get_contents("html/menu_in.html");
               echo "<h2>Üdvözöllek kedves ".$_SESSION['user'][1]."!</h2>";
               
           } else{
               //senki nincs bejelentkezve
               echo file_get_contents("html/menu_out.html");
           }
           
       
    $con -> close();
    echo file_get_contents("html/footer.html");