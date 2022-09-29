<?php 
if(isset($_GET['documento'])){
    $documento = $_GET['documento'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documento</title>
</head>
<body>
    <iframe class="visor-archivos" src="../documentos/<?php echo $documento; ?>" 
        alt="Documento evidencia" style="overflow:hidden;overflow-x:hidden;overflow-y:hidden;height:100%;width:100%;position:absolute;top:0%;left:0px;right:0px;bottom:0px"
        width="100%" height="100%" frameborder="0" seamless="seamless">
        Documento
    </iframe>
</body>
</html>