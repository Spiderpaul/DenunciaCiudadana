<?php
include 'conexion.php';

$datos = [];

try{

    if($dbh){
        $stmt = $dbh->prepare("SELECT fecha, etiqueta FROM `denuncia ciudadana`UNION
        SELECT fecha, etiqueta FROM `denuncia anonima` UNION
        SELECT fecha, etiqueta FROM `denuncia servidor publico`;");
        $stmt->execute();

        while($row = $stmt->fetch()){
            $datos[] = [
                'fecha' => $row->fecha,
                'etiqueta' => $row->etiqueta
            ];
        }
    }

    $eneroDC = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $etiqueta = $item['etiqueta'];
        return $fecha == "2022-01" && $etiqueta == "DC";
    });
    $eneroDA = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $etiqueta = $item['etiqueta'];
        return $fecha == "2022-01" && $etiqueta == "DA";
    });
    $eneroDSP = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $etiqueta = $item['etiqueta'];
        return $fecha == "2022-01" && $etiqueta == "DSP";
    });
    
    $febreroDC = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $etiqueta = $item['etiqueta'];
        return $fecha == "2022-02" && $etiqueta == "DC";
    });
    $febreroDA = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $etiqueta = $item['etiqueta'];
        return $fecha == "2022-02" && $etiqueta == "DA";
    });
    $febreroDSP = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $etiqueta = $item['etiqueta'];
        return $fecha == "2022-02" && $etiqueta == "DSP";
    });

    $marzoDC = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $etiqueta = $item['etiqueta'];
        return $fecha == "2022-03" && $etiqueta == "DC";
    });
    $marzoDA = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $etiqueta = $item['etiqueta'];
        return $fecha == "2022-03" && $etiqueta == "DA";
    });
    $marzoDSP = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $etiqueta = $item['etiqueta'];
        return $fecha == "2022-03" && $etiqueta == "DSP";
    });
    
    $abrilDC = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $etiqueta = $item['etiqueta'];
        return $fecha == "2022-04" && $etiqueta == "DC";
    });
    $abrilDA = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $etiqueta = $item['etiqueta'];
        return $fecha == "2022-04" && $etiqueta == "DA";
    });
    $abrilDSP = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $etiqueta = $item['etiqueta'];
        return $fecha == "2022-04" && $etiqueta == "DSP";
    });
    
    $mayoDC = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $etiqueta = $item['etiqueta'];
        return $fecha == "2022-05" && $etiqueta == "DC";
    });
    $mayoDA = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $etiqueta = $item['etiqueta'];
        return $fecha == "2022-05" && $etiqueta == "DA";
    });
    $mayoDSP = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $etiqueta = $item['etiqueta'];
        return $fecha == "2022-05" && $etiqueta == "DSP";
    });
    
    $junioDC = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $etiqueta = $item['etiqueta'];
        return $fecha == "2022-06" && $etiqueta == "DC";
    });
    $junioDA = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $etiqueta = $item['etiqueta'];
        return $fecha == "2022-06" && $etiqueta == "DA";
    });
    $junioDSP = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $etiqueta = $item['etiqueta'];
        return $fecha == "2022-06" && $etiqueta == "DSP";
    });
    
    $julioDC = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $etiqueta = $item['etiqueta'];
        return $fecha == "2022-07" && $etiqueta == "DC";
    });
    $julioDA = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $etiqueta = $item['etiqueta'];
        return $fecha == "2022-07" && $etiqueta == "DA";
    });
    $julioDSP = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $etiqueta = $item['etiqueta'];
        return $fecha == "2022-07" && $etiqueta == "DSP";
    });
    
    $agostoDC = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $etiqueta = $item['etiqueta'];
        return $fecha == "2022-08" && $etiqueta == "DC";
    });
    $agostoDA = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $etiqueta = $item['etiqueta'];
        return $fecha == "2022-08" && $etiqueta == "DA";
    });
    $agostoDSP = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $etiqueta = $item['etiqueta'];
        return $fecha == "2022-08" && $etiqueta == "DSP";
    });
    
    $septiembreDC = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $etiqueta = $item['etiqueta'];
        return $fecha == "2022-09" && $etiqueta == "DC";
    });
    $septiembreDA = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $etiqueta = $item['etiqueta'];
        return $fecha == "2022-09" && $etiqueta == "DA";
    });
    $septiembreDSP = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $etiqueta = $item['etiqueta'];
        return $fecha == "2022-09" && $etiqueta == "DSP";
    });
    
    $octubreDC = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $etiqueta = $item['etiqueta'];
        return $fecha == "2022-10" && $etiqueta == "DC";
    });
    $octubreDA = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $etiqueta = $item['etiqueta'];
        return $fecha == "2022-10" && $etiqueta == "DA";
    });
    $octubreDSP = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $etiqueta = $item['etiqueta'];
        return $fecha == "2022-10" && $etiqueta == "DSP";
    });
    
    $noviembreDC = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $etiqueta = $item['etiqueta'];
        return $fecha == "2022-11" && $etiqueta == "DC";
    });
    $noviembreDA = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $etiqueta = $item['etiqueta'];
        return $fecha == "2022-11" && $etiqueta == "DA";
    });
    $noviembreDSP = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $etiqueta = $item['etiqueta'];
        return $fecha == "2022-11" && $etiqueta == "DSP";
    });
    
    $diciembreDC = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $etiqueta = $item['etiqueta'];
        return $fecha == "2022-12" && $etiqueta == "DC";
    });
    $diciembreDA = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $etiqueta = $item['etiqueta'];
        return $fecha == "2022-12" && $etiqueta == "DA";
    });
    $diciembreDSP = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $etiqueta = $item['etiqueta'];
        return $fecha == "2022-12" && $etiqueta == "DSP";
    });

    $denunciaCiudadana = [
        'eneroDC' => count($eneroDC),
        'eneroDA' => count($eneroDA),
        'eneroDSP' => count($eneroDSP),
        'febreroDC' => count($febreroDC),
        'febreroDA' => count($febreroDA),
        'febreroDSP' => count($febreroDSP),
        'marzoDC' => count($marzoDC),
        'marzoDA' => count($marzoDA),
        'marzoDSP' => count($marzoDSP),
        'abrilDC' => count($abrilDC),
        'abrilDA' => count($abrilDA),
        'abrilDSP' => count($abrilDSP),
        'mayoDC' => count($mayoDC),
        'mayoDA' => count($mayoDA),
        'mayoDSP' => count($mayoDSP),
        'junioDC' => count($junioDC),
        'junioDA' => count($junioDA),
        'junioDSP' => count($junioDSP),
        'julioDC' => count($julioDC),
        'julioDA' => count($julioDA),
        'julioDSP' => count($julioDSP),
        'agostoDC' => count($agostoDC),
        'agostoDA' => count($agostoDA),
        'agostoDSP' => count($agostoDSP),
        'septiembreDC' => count($septiembreDC),
        'septiembreDA' => count($septiembreDA),
        'septiembreDSP' => count($septiembreDSP),
        'octubreDC' => count($octubreDC),
        'octubreDA' => count($octubreDA),
        'octubreDSP' => count($octubreDSP),
        'noviembreDC' => count($noviembreDC),
        'noviembreDA' => count($noviembreDA),
        'noviembreDSP' => count($noviembreDSP),
        'diciembreDC' => count($diciembreDC),
        'diciembreDA' => count($diciembreDA),
        'diciembreDSP' => count($diciembreDSP)
    ];
}catch(PDOException $e){
    echo "Error al realizar petición";
}

// var_dump($denunciaCiudadana);
echo json_encode($denunciaCiudadana);
?>