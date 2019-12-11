<?php

session_start(); //munkamenet követése miatt

require_once('config/connect.php'); //adatbázishoz csatlakozunk
echo file_get_contents("html/header.html");

if (isset($_SESSION['user']) && (!empty($_SESSION['user']))) {
    //Valaki be van jelentkezve
    echo file_get_contents("html/menu_in.html");
} else {
    //senki nincs bejelentkezve
    echo file_get_contents("html/menu_out.html");
}
if(empty($_GET['pid'])){
    echo 'A keresett termék nem létezik!';
}
else{
    $pid = $_GET['pid'];
    $sql = "SELECT * FROM products WHERE id = ?;";
    //prep statment start
    $stmt = $con -> prepare($sql);
    $stmt -> bind_param("i",$pid);
    $stmt -> execute();
    $stmt -> store_result();
    $stmt -> bind_result($id,$nev,$ar,$mennyiseg,$leiras);
    $stmt -> fetch(); 
    $stmt -> close();
}


?>

<a class="btn btn-success" href="products.php">Vissza</a>
<div class="row d-flex justify-content-center">
<div class="card col-md-6">
  <img style="width:50%;" class="card-image-top" src="images/no-image.jpg">
     <div class="card-body">
         <h4 class="card-title"><?php echo $nev?></h4>
         <p class="card-text"><?php echo $ar."Ft"?></p>
         <p class="card-text"><?php echo $mennyiseg?></p>
         <p class="card-text"><?php echo $leiras?></p>
    </div>
</div>
</div>
<?php
echo file_get_contents("html/footer.html");
$con->close();
