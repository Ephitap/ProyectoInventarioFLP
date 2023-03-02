<?php

require 'config.php';

$columns = [
    'unidad',	
    'original',	
    'tipoUnidad',	
    'tipo',	
    'destino',	
    'nota',	
    'cliente',	
    'deposito',	
    'estado',	
    'paraVenta',	
    'notaEstado',	
    'fechaFabric',	
    'nTramite',	
    'fechaLimite',	
    'fechaCompra',	
    'proovedor',	
    'factCompra',	
    'monedaCompra',	
    'valorCompra',	
    'valorFab',	
    'marcaMaquina',	
    'modeloMaquina',	
    'familia',	
    'categoria',	
    'depositoAgrupado'];

    $columnsWhere = [
        'unidad',	
        'original',	
        'fechaFabric'
        ];

    $table="unidades";

    $campo = ($_POST['campo']) ?? null;

    /* Filtrado */
    $where = '';
    if($campo != null){
        $where = "WHERE (";

        $cont = count($columnsWhere);
        for($i = 0;$i < $cont; $i++){
            $where .= $columnsWhere[$i] . " LIKE '%". $campo . "%' OR ";
        }
        $where = substr_replace($where, "", -3);
        $where .= ")";
    }

    /*Limit */
    $limit = isset($_POST['registros']) ? $conn->real_escape_string($_POST['registros']) : 10;
    $sLimit = "LIMIT $limit";
    
    $sql = "SELECT " . implode(", ", $columns) ." 
    FROM $table
    $where
    $sLimit";
    
    $resultado =$conn->query($sql);
    $num_rows= $resultado->num_rows;

    $html = '';

    if($num_rows >0){
        while($row = $resultado->fetch_assoc()){
            $html .= '<tr>';
            $html .= '<td>'.$row['unidad'].'</td>';
            $html .= '<td>'.$row['original'].'</td>';
            $html .= '<td>'.$row['tipoUnidad'].'</td>';
            $html .= '<td>'.$row['tipo'].'</td>';
            $html .= '<td>'.$row['destino'].'</td>';
            $html .= '<td>'.$row['nota'].'</td>';
            $html .= '<td>'.$row['cliente'].'</td>';
            $html .= '<td>'.$row['deposito'].'</td>';
            $html .= '<td>'.$row['estado'].'</td>';
            $html .= '<td>'.$row['paraVenta'].'</td>';
            $html .= '<td>'.$row['notaEstado'].'</td>';
            $html .= '<td>'.$row['fechaFabric'].'</td>';
            $html .= '<td>'.$row['nTramite'].'</td>';
            $html .= '<td>'.$row['fechaLimite'].'</td>';
            $html .= '<td>'.$row['fechaCompra'].'</td>';
            $html .= '<td>'.$row['proovedor'].'</td>';
            $html .= '<td>'.$row['factCompra'].'</td>';
            $html .= '<td>'.$row['monedaCompra'].'</td>';
            $html .= '<td>'.$row['valorCompra'].'</td>';
            $html .= '<td>'.$row['valorFab'].'</td>';
            $html .= '<td>'.$row['marcaMaquina'].'</td>';
            $html .= '<td>'.$row['modeloMaquina'].'</td>';
            $html .= '<td>'.$row['familia'].'</td>';
            $html .= '<td>'.$row['categoria'].'</td>';
            $html .= '<td>'.$row['depositoAgrupado'].'</td>';
            $html .= '<td><a href="">Editar</a></td>';
            $html .= '<td><a href="">Eliminar</a></td>';
            $html .= '<tr>';
        }
    }else{
        $html .= '<tr>';
        $html .= '<td collspan=27>Sin Resultados</td>';
        $html .= '</tr>';
    }

    echo json_encode($html, JSON_UNESCAPED_UNICODE);
?>