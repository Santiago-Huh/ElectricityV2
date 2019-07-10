<?php 
require('../modelos/conexion.php');
sleep(1);
if (isset($_POST)) {
    $idLumi = (string)$_POST['luminaID'];
 
    $result = Conexion::conectar()->prepare(
        'SELECT * FROM registro WHERE luminId = "'.strtolower($idLumi).'"'
    );

    $result->execute();
    $verificar = $result->fetch();
 
    if ($verificar["luminId"] > 0) {
        echo '<div class="alert alert-danger"><strong>Oh no!</strong> ID de luminaria no disponible.</div>';
    } else {
        echo '<div class="alert alert-success"><strong>Enhorabuena!</strong> ID disponible.</div>';
    }
}