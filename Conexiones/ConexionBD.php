<?php
class Conexion{
    public static function IniciarConexion(){
        $conexion = new PDO("mysql:host=localhost;dbname=l20370950;charset=utf8", "l20370950", "CCL50+it62");
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexion;
    }  
} 