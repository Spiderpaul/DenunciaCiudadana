<?php
include 'conexion.php';

$datos = [];

try{

    if($dbh){
        $stmt = $dbh->prepare("SELECT dc.fecha, ed.estatus FROM `denuncia ciudadana` dc JOIN `estatus de denuncia` ed
        WHERE dc.id_denuncia = ed.id_denuncia_c UNION
        SELECT da.fecha, ed.estatus FROM `denuncia anonima` da JOIN `estatus de denuncia` ed
        WHERE da.id_denuncia = ed.id_denuncia_a UNION
        SELECT dsp.fecha, ed.estatus FROM `denuncia servidor publico` dsp JOIN `estatus de denuncia` ed
        WHERE dsp.id_denuncia = ed.id_denuncia_sp;");
        $stmt->execute();

        while($row = $stmt->fetch()){
            $datos[] = [
                'fecha' => $row->fecha,
                'estatus' => $row->estatus
            ];
        }
    }

    $enero1 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-01" && $estatus == "En espera";
    });
    $enero2 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-01" && $estatus == "En proceso";
    });
    $enero3 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-01" && $estatus == "Finalizado";
    });
    $enero4 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-01" && $estatus == "Cancelado";
    });
    $enero5 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-01" && $estatus == "No aplica";
    });
    
    
    $febrero1 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-02" && $estatus == "En espera";
    });
    $febrero2 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-02" && $estatus == "En proceso";
    });
    $febrero3 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-02" && $estatus == "Finalizado";
    });
    $febrero4 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-02" && $estatus == "Cancelado";
    });
    $febrero5 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-02" && $estatus == "No aplica";
    });

    $marzo1 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-03" && $estatus == "En espera";
    });
    $marzo2 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-03" && $estatus == "En proceso";
    });
    $marzo3 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-03" && $estatus == "Finalizado";
    });
    $marzo4 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-03" && $estatus == "Cancelado";
    });
    $marzo5 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-03" && $estatus == "No aplica";
    });
    
    $abril1 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-04" && $estatus == "En espera";
    });
    $abril2 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-04" && $estatus == "En proceso";
    });
    $abril3 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-04" && $estatus == "Finalizado";
    });
    $abril4 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-04" && $estatus == "Cancelado";
    });
    $abril5 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-04" && $estatus == "No aplica";
    });
    
    $mayo1 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-05" && $estatus == "En espera";
    });
    $mayo2 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-05" && $estatus == "En proceso";
    });
    $mayo3 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-05" && $estatus == "Finalizado";
    });
    $mayo4 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-05" && $estatus == "Cancelado";
    });
    $mayo5 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-05" && $estatus == "No aplica";
    });
    
    $junio1 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-06" && $estatus == "En espera";
    });
    $junio2 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-06" && $estatus == "En proceso";
    });
    $junio3 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-06" && $estatus == "Finalizado";
    });
    $junio4 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-06" && $estatus == "Cancelado";
    });
    $junio5 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-06" && $estatus == "No aplica";
    });
    
    $julio1 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-07" && $estatus == "En espera";
    });
    $julio2 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-07" && $estatus == "En proceso";
    });
    $julio3 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-07" && $estatus == "Finalizado";
    });
    $julio4 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-07" && $estatus == "Cancelado";
    });
    $julio5 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-07" && $estatus == "No aplica";
    });
    
    $agosto1 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-08" && $estatus == "En espera";
    });
    $agosto2 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-08" && $estatus == "En proceso";
    });
    $agosto3 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-08" && $estatus == "Finalizado";
    });
    $agosto4 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-08" && $estatus == "Cancelado";
    });
    $agosto5 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-08" && $estatus == "No aplica";
    });
    
    $septiembre1 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-09" && $estatus == "En espera";
    });
    $septiembre2 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-09" && $estatus == "En proceso";
    });
    $septiembre3 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-09" && $estatus == "Finalizado";
    });
    $septiembre4 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-09" && $estatus == "Cancelado";
    });
    $septiembre5 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-09" && $estatus == "No aplica";
    });
    
    $octubre1 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-10" && $estatus == "En espera";
    });
    $octubre2 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-10" && $estatus == "En proceso";
    });
    $octubre3 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-10" && $estatus == "Finalizado";
    });
    $octubre4 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-10" && $estatus == "Cancelado";
    });
    $octubre5 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-10" && $estatus == "No aplica";
    });
    
    $noviembre1 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-11" && $estatus == "En espera";
    });
    $noviembre2 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-11" && $estatus == "En proceso";
    });
    $noviembre3 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-11" && $estatus == "Finalizado";
    });
    $noviembre4 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-11" && $estatus == "Cancelado";
    });
    $noviembre5 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-11" && $estatus == "No aplica";
    });
    
    
    $diciembre1 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-12" && $estatus == "En espera";
    });
    $diciembre2 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-12" && $estatus == "En proceso";
    });
    $diciembre3 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-12" && $estatus == "Finalizado";
    });
    $diciembre4 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-12" && $estatus == "Cancelado";
    });
    $diciembre5 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $estatus = $item['estatus'];
        return $fecha == "2022-12" && $estatus == "No aplica";
    });

    $denunciaCiudadana = [
        'enero1' => count($enero1),
        'enero2' => count($enero2),
        'enero3' => count($enero3),
        'enero4' => count($enero4),
        'enero5' => count($enero5),
        'febrero1' => count($febrero1),
        'febrero2' => count($febrero2),
        'febrero3' => count($febrero3),
        'febrero4' => count($febrero4),
        'febrero5' => count($febrero5),
        'marzo1' => count($marzo1),
        'marzo2' => count($marzo2),
        'marzo3' => count($marzo3),
        'marzo4' => count($marzo4),
        'marzo5' => count($marzo5),
        'abril1' => count($abril1),
        'abril2' => count($abril2),
        'abril3' => count($abril3),
        'abril4' => count($abril4),
        'abril5' => count($abril5),
        'mayo1' => count($mayo1),
        'mayo2' => count($mayo2),
        'mayo3' => count($mayo3),
        'mayo4' => count($mayo4),
        'mayo5' => count($mayo5),
        'junio1' => count($junio1),
        'junio2' => count($junio2),
        'junio3' => count($junio3),
        'junio4' => count($junio4),
        'junio5' => count($junio5),
        'julio1' => count($julio1),
        'julio2' => count($julio2),
        'julio3' => count($julio3),
        'julio4' => count($julio4),
        'julio5' => count($julio5),
        'agosto1' => count($agosto1),
        'agosto2' => count($agosto2),
        'agosto3' => count($agosto3),
        'agosto4' => count($agosto4),
        'agosto5' => count($agosto5),
        'septiembre1' => count($septiembre1),
        'septiembre2' => count($septiembre2),
        'septiembre3' => count($septiembre3),
        'septiembre4' => count($septiembre4),
        'septiembre5' => count($septiembre5),
        'octubre1' => count($octubre1),
        'octubre2' => count($octubre2),
        'octubre3' => count($octubre3),
        'octubre4' => count($octubre4),
        'octubre5' => count($octubre5),
        'noviembre1' => count($noviembre1),
        'noviembre2' => count($noviembre2),
        'noviembre3' => count($noviembre3),
        'noviembre4' => count($noviembre4),
        'noviembre5' => count($noviembre5),
        'diciembre1' => count($diciembre1),
        'diciembre2' => count($diciembre2),
        'diciembre3' => count($diciembre3),
        'diciembre4' => count($diciembre4),
        'diciembre5' => count($diciembre5),
    ];
}catch(PDOException $e){
    echo "Error al realizar petición";
}

// var_dump($denunciaCiudadana);
echo json_encode($denunciaCiudadana);
?>