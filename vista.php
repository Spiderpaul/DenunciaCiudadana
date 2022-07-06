<?php
include 'servidor/conexion.php';

//$id = isset($_GET['id'])?$_GET['id'] : "";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    $stmt = $dbh->prepare("SELECT * FROM `denuncia anonima` 
    WHERE id_denuncia = ?");
    $stmt->bindParam(1,$id);
    $stmt->execute();
    
    $cont = $stmt->rowCount();
    if($cont==0){
        $stmt = $dbh->prepare("SELECT * FROM `denuncia ciudadana` 
        WHERE id_denuncia = ?");
        $stmt->bindParam(1,$id);
        $stmt->execute();
    
        $cont = $stmt->rowCount();
    }else if($cont == 0){
        $stmt = $dbh->prepare("SELECT * FROM `denuncia servidor publico` 
        WHERE id_denuncia = ?");
        $stmt->bindParam(1,$id);
        $stmt->execute();
    }

    $row = $stmt->fetch();

    header('Content-Type:'.$row->nombre_evidencia);
    echo $row->evidencia;
}else{
    echo "Existe un problema para visualizar el documento.";
}

?>