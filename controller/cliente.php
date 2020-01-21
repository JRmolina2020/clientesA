<?php
require_once "../model/Clientes.php";
$cliente = new Cliente();
$id = isset($_POST["id"]) ? limpiarCadena($_POST["id"]) : "";
$tipo_persona = isset($_POST["tipo"]) ? limpiarCadena($_POST["tipo"]) : "";
$tipo_regimen = isset($_POST["regimen"]) ? limpiarCadena($_POST["regimen"]) : "";
$isiva = isset($_POST["iva"]) ? limpiarCadena($_POST["iva"]) : "";
$tipo_identi = isset($_POST["tipo_identi"]) ? limpiarCadena($_POST["tipo_identi"]) : "";
switch ($_GET["op"]) {
    case 'update':
        $rspta = $cliente->update($id, $tipo_persona, $tipo_regimen, $isiva, $tipo_identi);
        echo $rspta ? "Cliente actualizado" : "El registro no se pudo actualizar";
        break;
    case 'show':
        $rspta = $cliente->show($id);
        echo json_encode($rspta);
        break;
    case 'index':
        $rspta = $cliente->index();
        $data = array();
        while ($reg = $rspta->fetch_object()) {
            $data[] = array(
                "0" =>
                '<button class="btn btn-xs btn-success" 
 				onclick="show(' . $reg->id . ')"><i class="fa fa-pencil">
 				</i></button>',
                "1" => $reg->empresa,
                "2" => $reg->nombre,
                "3" => ($reg->tipo_persona == 1) ? "persona juridica" : "persona natural",
                "4" => ($reg->regimen == 48) ? "Impuesto sobre las ventas – IVA " : "no es responsable de iva",
                "5" => ($reg->iva == 1) ? "si" : "no",
                "6" => $reg->tipo_ident
            );
        }
        $results = array(
            "sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data
        );
        echo json_encode($results);
        break;
}
