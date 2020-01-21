<?php
require "../config/Conexion.php";
class Cliente
{
    public function __construct()
    {
    }

    public function index()
    {
        $sql = "SELECT C.ID AS id, C.NIT AS nit ,C.EMPRESA AS empresa, C.REPRESENTANTE AS nombre,
        C.TELEFONOS AS telefono, C.tipo_persona AS tipo_persona, 
        C.tipo_regimen AS regimen, C.es_responsable_iva as iva, C.tipo_identificacion 
        AS tipo_ident FROM clientes C";
        return ejecutarConsulta($sql);
    }

    public function show($id)
    {
        $sql = "SELECT id, representante as nombre,empresa,tipo_persona as tipo,tipo_regimen as regimen,
        es_responsable_iva as iva,tipo_identificacion as tipo_ident
         FROM clientes WHERE id='$id'";
        return ejecutarConsultaSimpleFila($sql);
    }

    public function update($id, $tipo_persona, $tipo_regimen, $isiva, $tipo_identi)
    {
        $sql = "UPDATE clientes SET  
         tipo_persona='$tipo_persona',
         tipo_regimen='$tipo_regimen',
         es_responsable_iva='$isiva',
         tipo_identificacion='$tipo_identi'
         WHERE id='$id'";
        return ejecutarConsulta($sql);
    }
}
