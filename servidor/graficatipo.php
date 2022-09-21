<?php
include 'conexion.php';

$datosDC = [];

try{

    if($dbh){
        $stmt = $dbh->prepare("SELECT fecha FROM `denuncia ciudadana`;");
        $stmt->execute();

        while($row = $stmt->fetch()){
            $datosDC[] = [
                'fecha' => $row->fecha
            ];
        }
    }

    $enero = array_filter($datosDC, function($ago){
        $recorte = substr($ago['fecha'], 0, 7);
        return $recorte == "2022-01";
    });
    
    $febrero = array_filter($datosDC, function($ago){
        $recorte = substr($ago['fecha'], 0, 7);
        return $recorte == "2022-02";
    });
    $marzo = array_filter($datosDC, function($ago){
        $recorte = substr($ago['fecha'], 0, 7);
        return $recorte == "2022-03";
    });
    $abril = array_filter($datosDC, function($ago){
        $recorte = substr($ago['fecha'], 0, 7);
        return $recorte == "2022-04";
    });
    $mayo = array_filter($datosDC, function($ago){
        $recorte = substr($ago['fecha'], 0, 7);
        return $recorte == "2022-05";
    });
    $junio = array_filter($datosDC, function($ago){
        $recorte = substr($ago['fecha'], 0, 7);
        return $recorte == "2022-06";
    });
    $julio = array_filter($datosDC, function($ago){
        $recorte = substr($ago['fecha'], 0, 7);
        return $recorte == "2022-07";
    });
    $agosto = array_filter($datosDC, function($ago){
        $recorte = substr($ago['fecha'], 0, 7);
        return $recorte == "2022-08";
    });
    $septiembre = array_filter($datosDC, function($ago){
        $recorte = substr($ago['fecha'], 0, 7);
        return $recorte == "2022-09";
    });
    $octubre = array_filter($datosDC, function($ago){
        $recorte = substr($ago['fecha'], 0, 7);
        return $recorte == "2022-10";
    });
    $noviembre = array_filter($datosDC, function($ago){
        $recorte = substr($ago['fecha'], 0, 7);
        return $recorte == "2022-11";
    });
    $diciembre = array_filter($datosDC, function($ago){
        $recorte = substr($ago['fecha'], 0, 7);
        return $recorte == "2022-12";
    });

    $denunciaCiudadana = [
        'enero' => count($enero),
        'febrero' => count($febrero),
        'marzo' => count($marzo),
        'abril' => count($abril),
        'mayo' => count($mayo),
        'junio' => count($junio),
        'julio' => count($julio),
        'agosto' => count($agosto),
        'septiembre' => count($septiembre),
        'octubre' => count($octubre),
        'noviembre' => count($noviembre),
        'diciembre' => count($diciembre)
    ];
}catch(PDOException $e){
    echo "Error al realizar petición";
}

// var_dump($denunciaCiudadana);
echo json_encode($denunciaCiudadana);
?>