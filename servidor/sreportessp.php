<?php
include 'conexion.php';

function tabla($dbh){
    // Para evitar errores por variables nulas.
    if(isset($_POST['id'])){
        $idDenuncia = "%".$_POST['id']."%";
    }else{
        $idDenuncia = "";
    }

    if(isset($_POST['id_asesor'])){
        $asesor = "%".$_POST['id_asesor']."%";
    }else{
        $asesor = "";
    }

    if(isset($_POST['tipo'])){
        $tipo = "%".$_POST['tipo']."%";
    }else{
        $tipo = "";
    }

    if(isset($_POST['estatus'])){
        $estatus = "%".$_POST['estatus']."%";
    }else{
        $estatus = "";
    }

    if(isset($_POST['desde'])){
        $desde = $_POST['desde'];
        
    }else{
        $desde = "";
    }

    if(isset($_POST['hasta'])){
        $hasta = $_POST['hasta'];

    }else{
        $hasta = "";
    }

    //Variables booleanas para ayudar en la sentencia. 
    $id = false; $as = false; $ti = false; $es = false; $de = false; $ha = false;


    try{
        
        //En caso de tener los campos vacíos.
        if($idDenuncia == "" && $asesor == "" && $tipo == "" && $estatus == "" && $desde == "" && $hasta == ""){
            
            $stmt = $dbh->prepare("SELECT * FROM `denuncia servidor publico` JOIN `estatus de denuncia` 
            WHERE `denuncia servidor publico`.id_denuncia = `estatus de denuncia`.id_denuncia_sp;");
            
            $stmt->execute();
        }else{
            //Si hay información.
            $contador = [];
            $cont = 0;
            $sentencia = 'SELECT * FROM `denuncia servidor publico` JOIN `estatus de denuncia`
            WHERE `denuncia servidor publico`.id_denuncia = `estatus de denuncia`.id_denuncia_sp';

            if($idDenuncia != "%%" && $idDenuncia != ""){
                $sentencia .= ' AND `denuncia servidor publico`.id_denuncia LIKE ?';
                array_push($contador, $cont+1);
                $id = true;
            }

            if($asesor != "%%" && $asesor != ""){
                $sentencia .= ' AND `estatus de denuncia`.id_asesor LIKE ?';
                array_push($contador, $cont+1);
                $as = true;
            }

            if($tipo != "%%" && $tipo != ""){
                $sentencia .= ' AND `denuncia servidor publico`.tipo_denuncia LIKE ?';
                array_push($contador, $cont+1);
                $ti = true;
            }

            if($estatus != "%%" && $estatus != ""){
                $sentencia .= ' AND `estatus de denuncia`.estatus LIKE ?';
                array_push($contador, $cont+1);
                $es = true;
            }

            if($desde != "" || $hasta != ""){
                        
                if($desde != "" && $hasta != ""){
                    $sentencia .= ' AND `denuncia servidor publico`.fecha BETWEEN ? AND ?';
                    array_push($contador, $cont+1);
                    $de = true;
                    $ha = true;
                }else if($desde != "" && $hasta == ""){
                    $sentencia .= ' AND `denuncia servidor publico`.fecha >= ?';
                    array_push($contador, $cont+1);
                    $de = true;
                }else if($desde == "" && $hasta != ""){
                    $sentencia .= ' AND `denuncia servidor publico`.fecha <= ?';
                    array_push($contador, $cont+1);
                    $ha = true;
                }
            }


            $sentencia .= ';';
            $stmt = $dbh->prepare($sentencia);
            
            for($i = 1; $i <= count($contador); $i++){

                if($id == true){
                    $stmt->bindParam($i,$idDenuncia);
                    $id = false;
                }else if($as == true){
                    $stmt->bindParam($i,$asesor);
                    $as = false;
                }else if($ti == true){
                    $stmt->bindParam($i,$tipo);
                    $ti = false;
                }else if($es == true){
                    $stmt->bindParam($i,$estatus);
                    $es = false;
                }else if($de == true || $ha == true){
                    if($de == true && $ha == true){
                        $stmt->bindParam($i,$desde);
                        $stmt->bindParam($i+1,$hasta);
                    }               
                    if($de == true && $ha == false){
                        $stmt->bindParam($i,$desde);
                    }
                    if($de == false && $ha == true){
                        $stmt->bindParam($i,$hasta);
                    }
                    $es = false;
                    $ha = false;
                }
            }
            $stmt->execute();
        }
        while($row = $stmt->fetch()){
        ?>
            <tr>
                <td><?php echo $row->id_denuncia; ?></td>
                <td><?php echo $row->asunto; ?></td> 
                <td><?php echo $row->tipo_denuncia; ?></td>
                <td><?php echo $row->descripcion; ?></td>
                <td>
                    <a class="evidencia" target="_blank" href="servidor publico/vista.php?id=<?php echo $row->id_denuncia; ?>">
                        <?php echo $row->nombre_evidencia; ?>
                    </a>
                </td>
                <td><?php echo $row->id_asesor; ?></td>
                <td><?php echo $row->estatus; ?></td>
                <td><?php echo $row->nota; ?></td>
                <td><?php echo $row->fecha; ?></td>
            </tr>
            <?php
        }
        
    }catch(PDOException $e){
        echo '<script language="javascript">
                alert("Se ha detectado un error al conectar a la base de datos");
                window.history.back();
                </script>';
    }
}


?>