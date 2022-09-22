<?php
include 'conexion.php';

$datos = [];

try{

    if($dbh){
        $stmt = $dbh->prepare("SELECT fecha, tipo_denuncia FROM `denuncia ciudadana`UNION
        SELECT fecha, tipo_denuncia FROM `denuncia anonima` UNION
        SELECT fecha, tipo_denuncia FROM `denuncia servidor publico`;");
        $stmt->execute();

        while($row = $stmt->fetch()){
            $datos[] = [
                'fecha' => $row->fecha,
                'tipo_denuncia' => $row->tipo_denuncia
            ];
        }
    }

    $enero1 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-01" && $tipo_denuncia == "Abuso de autoridad";
    });
    $enero2 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-01" && $tipo_denuncia == "Acoso y Hostigamiento";
    });
    $enero3 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-01" && $tipo_denuncia == "Soborno para algún trámite o servicio";
    });
    $enero4 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-01" && $tipo_denuncia == "Incumplimiento o mal uso de un programa o acción social";
    });
    $enero5 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-01" && $tipo_denuncia == "Trato irrespetuoso y mala conducta";
    });
    $enero6 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-01" && $tipo_denuncia == "Servidor público autorisa, solicita o realiza actos para su beneficio";
    });
    $enero7 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-01" && $tipo_denuncia == "Solicitud de documentos o dinero adicional para la expedición de documentos";
    });
    $enero8 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-01" && $tipo_denuncia == "Otro";
    });
    
    
    $febrero1 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-02" && $tipo_denuncia == "Abuso de autoridad";
    });
    $febrero2 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-02" && $tipo_denuncia == "Acoso y Hostigamiento";
    });
    $febrero3 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-02" && $tipo_denuncia == "Soborno para algún trámite o servicio";
    });
    $febrero4 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-02" && $tipo_denuncia == "Incumplimiento o mal uso de un programa o acción social";
    });
    $febrero5 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-02" && $tipo_denuncia == "Trato irrespetuoso y mala conducta";
    });
    $febrero6 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-02" && $tipo_denuncia == "Servidor público autorisa, solicita o realiza actos para su beneficio";
    });
    $febrero7 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-02" && $tipo_denuncia == "Solicitud de documentos o dinero adicional para la expedición de documentos";
    });
    $febrero8 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-02" && $tipo_denuncia == "Otro";
    });

    $marzo1 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-03" && $tipo_denuncia == "Abuso de autoridad";
    });
    $marzo2 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-03" && $tipo_denuncia == "Acoso y Hostigamiento";
    });
    $marzo3 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-03" && $tipo_denuncia == "Soborno para algún trámite o servicio";
    });
    $marzo4 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-03" && $tipo_denuncia == "Incumplimiento o mal uso de un programa o acción social";
    });
    $marzo5 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-03" && $tipo_denuncia == "Trato irrespetuoso y mala conducta";
    });
    $marzo6 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-03" && $tipo_denuncia == "Servidor público autorisa, solicita o realiza actos para su beneficio";
    });
    $marzo7 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-03" && $tipo_denuncia == "Solicitud de documentos o dinero adicional para la expedición de documentos";
    });
    $marzo8 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-03" && $tipo_denuncia == "Otro";
    });
    
    $abril1 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-04" && $tipo_denuncia == "Abuso de autoridad";
    });
    $abril2 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-04" && $tipo_denuncia == "Acoso y Hostigamiento";
    });
    $abril3 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-04" && $tipo_denuncia == "Soborno para algún trámite o servicio";
    });
    $abril4 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-04" && $tipo_denuncia == "Incumplimiento o mal uso de un programa o acción social";
    });
    $abril5 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-04" && $tipo_denuncia == "Trato irrespetuoso y mala conducta";
    });
    $abril6 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-04" && $tipo_denuncia == "Servidor público autorisa, solicita o realiza actos para su beneficio";
    });
    $abril7 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-04" && $tipo_denuncia == "Solicitud de documentos o dinero adicional para la expedición de documentos";
    });
    $abril8 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-04" && $tipo_denuncia == "Otro";
    });
    
    $mayo1 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-05" && $tipo_denuncia == "Abuso de autoridad";
    });
    $mayo2 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-05" && $tipo_denuncia == "Acoso y Hostigamiento";
    });
    $mayo3 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-05" && $tipo_denuncia == "Soborno para algún trámite o servicio";
    });
    $mayo4 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-05" && $tipo_denuncia == "Incumplimiento o mal uso de un programa o acción social";
    });
    $mayo5 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-05" && $tipo_denuncia == "Trato irrespetuoso y mala conducta";
    });
    $mayo6 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-05" && $tipo_denuncia == "Servidor público autorisa, solicita o realiza actos para su beneficio";
    });
    $mayo7 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-05" && $tipo_denuncia == "Solicitud de documentos o dinero adicional para la expedición de documentos";
    });
    $mayo8 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-05" && $tipo_denuncia == "Otro";
    });
    
    $junio1 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-06" && $tipo_denuncia == "Abuso de autoridad";
    });
    $junio2 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-06" && $tipo_denuncia == "Acoso y Hostigamiento";
    });
    $junio3 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-06" && $tipo_denuncia == "Soborno para algún trámite o servicio";
    });
    $junio4 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-06" && $tipo_denuncia == "Incumplimiento o mal uso de un programa o acción social";
    });
    $junio5 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-06" && $tipo_denuncia == "Trato irrespetuoso y mala conducta";
    });
    $junio6 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-06" && $tipo_denuncia == "Servidor público autorisa, solicita o realiza actos para su beneficio";
    });
    $junio7 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-06" && $tipo_denuncia == "Solicitud de documentos o dinero adicional para la expedición de documentos";
    });
    $junio8 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-06" && $tipo_denuncia == "Otro";
    });
    
    $julio1 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-07" && $tipo_denuncia == "Abuso de autoridad";
    });
    $julio2 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-07" && $tipo_denuncia == "Acoso y Hostigamiento";
    });
    $julio3 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-07" && $tipo_denuncia == "Soborno para algún trámite o servicio";
    });
    $julio4 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-07" && $tipo_denuncia == "Incumplimiento o mal uso de un programa o acción social";
    });
    $julio5 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-07" && $tipo_denuncia == "Trato irrespetuoso y mala conducta";
    });
    $julio6 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-07" && $tipo_denuncia == "Servidor público autorisa, solicita o realiza actos para su beneficio";
    });
    $julio7 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-07" && $tipo_denuncia == "Solicitud de documentos o dinero adicional para la expedición de documentos";
    });
    $julio8 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-07" && $tipo_denuncia == "Otro";
    });
    
    $agosto1 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-08" && $tipo_denuncia == "Abuso de autoridad";
    });
    $agosto2 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-08" && $tipo_denuncia == "Acoso y Hostigamiento";
    });
    $agosto3 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-08" && $tipo_denuncia == "Soborno para algún trámite o servicio";
    });
    $agosto4 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-08" && $tipo_denuncia == "Incumplimiento o mal uso de un programa o acción social";
    });
    $agosto5 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-08" && $tipo_denuncia == "Trato irrespetuoso y mala conducta";
    });
    $agosto6 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-08" && $tipo_denuncia == "Servidor público autorisa, solicita o realiza actos para su beneficio";
    });
    $agosto7 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-08" && $tipo_denuncia == "Solicitud de documentos o dinero adicional para la expedición de documentos";
    });
    $agosto8 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-08" && $tipo_denuncia == "Otro";
    });
    
    $septiembre1 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-09" && $tipo_denuncia == "Abuso de autoridad";
    });
    $septiembre2 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-09" && $tipo_denuncia == "Acoso y Hostigamiento";
    });
    $septiembre3 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-09" && $tipo_denuncia == "Soborno para algún trámite o servicio";
    });
    $septiembre4 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-09" && $tipo_denuncia == "Incumplimiento o mal uso de un programa o acción social";
    });
    $septiembre5 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-09" && $tipo_denuncia == "Trato irrespetuoso y mala conducta";
    });
    $septiembre6 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-09" && $tipo_denuncia == "Servidor público autorisa, solicita o realiza actos para su beneficio";
    });
    $septiembre7 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-09" && $tipo_denuncia == "Solicitud de documentos o dinero adicional para la expedición de documentos";
    });
    $septiembre8 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-09" && $tipo_denuncia == "Otro";
    });
    
    $octubre1 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-10" && $tipo_denuncia == "Abuso de autoridad";
    });
    $octubre2 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-10" && $tipo_denuncia == "Acoso y Hostigamiento";
    });
    $octubre3 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-10" && $tipo_denuncia == "Soborno para algún trámite o servicio";
    });
    $octubre4 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-10" && $tipo_denuncia == "Incumplimiento o mal uso de un programa o acción social";
    });
    $octubre5 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-10" && $tipo_denuncia == "Trato irrespetuoso y mala conducta";
    });
    $octubre6 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-10" && $tipo_denuncia == "Servidor público autorisa, solicita o realiza actos para su beneficio";
    });
    $octubre7 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-10" && $tipo_denuncia == "Solicitud de documentos o dinero adicional para la expedición de documentos";
    });
    $octubre8 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-10" && $tipo_denuncia == "Otro";
    });
    
    $noviembre1 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-11" && $tipo_denuncia == "Abuso de autoridad";
    });
    $noviembre2 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-11" && $tipo_denuncia == "Acoso y Hostigamiento";
    });
    $noviembre3 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-11" && $tipo_denuncia == "Soborno para algún trámite o servicio";
    });
    $noviembre4 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-11" && $tipo_denuncia == "Incumplimiento o mal uso de un programa o acción social";
    });
    $noviembre5 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-11" && $tipo_denuncia == "Trato irrespetuoso y mala conducta";
    });
    $noviembre6 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-11" && $tipo_denuncia == "Servidor público autorisa, solicita o realiza actos para su beneficio";
    });
    $noviembre7 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-11" && $tipo_denuncia == "Solicitud de documentos o dinero adicional para la expedición de documentos";
    });
    $noviembre8 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-11" && $tipo_denuncia == "Otro";
    });
    
    
    $diciembre1 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-12" && $tipo_denuncia == "Abuso de autoridad";
    });
    $diciembre2 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-12" && $tipo_denuncia == "Acoso y Hostigamiento";
    });
    $diciembre3 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-12" && $tipo_denuncia == "Soborno para algún trámite o servicio";
    });
    $diciembre4 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-12" && $tipo_denuncia == "Incumplimiento o mal uso de un programa o acción social";
    });
    $diciembre5 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-12" && $tipo_denuncia == "Trato irrespetuoso y mala conducta";
    });
    $diciembre6 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-12" && $tipo_denuncia == "Servidor público autorisa, solicita o realiza actos para su beneficio";
    });
    $diciembre7 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-12" && $tipo_denuncia == "Solicitud de documentos o dinero adicional para la expedición de documentos";
    });
    $diciembre8 = array_filter($datos, function($item){
        $fecha = substr($item['fecha'], 0, 7);
        $tipo_denuncia = $item['tipo_denuncia'];
        return $fecha == "2022-12" && $tipo_denuncia == "Otro";
    });

    $denunciaCiudadana = [
        'enero1' => count($enero1),
        'enero2' => count($enero2),
        'enero3' => count($enero3),
        'enero4' => count($enero4),
        'enero5' => count($enero5),
        'enero6' => count($enero6),
        'enero7' => count($enero7),
        'enero8' => count($enero8),
        'febrero1' => count($febrero1),
        'febrero2' => count($febrero2),
        'febrero3' => count($febrero3),
        'febrero4' => count($febrero4),
        'febrero5' => count($febrero5),
        'febrero6' => count($febrero6),
        'febrero7' => count($febrero7),
        'febrero8' => count($febrero8),
        'marzo1' => count($marzo1),
        'marzo2' => count($marzo2),
        'marzo3' => count($marzo3),
        'marzo4' => count($marzo4),
        'marzo5' => count($marzo5),
        'marzo6' => count($marzo6),
        'marzo7' => count($marzo7),
        'marzo8' => count($marzo8),
        'abril1' => count($abril1),
        'abril2' => count($abril2),
        'abril3' => count($abril3),
        'abril4' => count($abril4),
        'abril5' => count($abril5),
        'abril6' => count($abril6),
        'abril7' => count($abril7),
        'abril8' => count($abril8),
        'mayo1' => count($mayo1),
        'mayo2' => count($mayo2),
        'mayo3' => count($mayo3),
        'mayo4' => count($mayo4),
        'mayo5' => count($mayo5),
        'mayo6' => count($mayo6),
        'mayo7' => count($mayo7),
        'mayo8' => count($mayo8),
        'junio1' => count($junio1),
        'junio2' => count($junio2),
        'junio3' => count($junio3),
        'junio4' => count($junio4),
        'junio5' => count($junio5),
        'junio6' => count($junio6),
        'junio7' => count($junio7),
        'junio8' => count($junio8),
        'julio1' => count($julio1),
        'julio2' => count($julio2),
        'julio3' => count($julio3),
        'julio4' => count($julio4),
        'julio5' => count($julio5),
        'julio6' => count($julio6),
        'julio7' => count($julio7),
        'julio8' => count($julio8),
        'agosto1' => count($agosto1),
        'agosto2' => count($agosto2),
        'agosto3' => count($agosto3),
        'agosto4' => count($agosto4),
        'agosto5' => count($agosto5),
        'agosto6' => count($agosto6),
        'agosto7' => count($agosto7),
        'agosto8' => count($agosto8),
        'septiembre1' => count($septiembre1),
        'septiembre2' => count($septiembre2),
        'septiembre3' => count($septiembre3),
        'septiembre4' => count($septiembre4),
        'septiembre5' => count($septiembre5),
        'septiembre6' => count($septiembre6),
        'septiembre7' => count($septiembre7),
        'septiembre8' => count($septiembre8),
        'octubre1' => count($octubre1),
        'octubre2' => count($octubre2),
        'octubre3' => count($octubre3),
        'octubre4' => count($octubre4),
        'octubre5' => count($octubre5),
        'octubre6' => count($octubre6),
        'octubre7' => count($octubre7),
        'octubre8' => count($octubre8),
        'noviembre1' => count($noviembre1),
        'noviembre2' => count($noviembre2),
        'noviembre3' => count($noviembre3),
        'noviembre4' => count($noviembre4),
        'noviembre5' => count($noviembre5),
        'noviembre6' => count($noviembre6),
        'noviembre7' => count($noviembre7),
        'noviembre8' => count($noviembre8),
        'diciembre1' => count($diciembre1),
        'diciembre2' => count($diciembre2),
        'diciembre3' => count($diciembre3),
        'diciembre4' => count($diciembre4),
        'diciembre5' => count($diciembre5),
        'diciembre6' => count($diciembre6),
        'diciembre7' => count($diciembre7),
        'diciembre8' => count($diciembre8),
    ];
}catch(PDOException $e){
    echo "Error al realizar petición";
}

// var_dump($denunciaCiudadana);
echo json_encode($denunciaCiudadana);
?>