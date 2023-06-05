<?php
include_once "Error/Error/Controlador/ErrorControlador.php";

if(isset($_GET['modulo'])){
    $modulo = $_GET['modulo'];
    if(isset($_GET['controlador'])){
        $controlador =  $_GET['controlador'];
        if(isset($_GET['accion'])){
            $accion = $_GET['accion']."<br>";
            $ruta = $modulo ."/".$controlador."/Controlador/".$controlador."Controlador.php";
           
            require_once $ruta;
            $nombreControlador = ucwords($controlador)."Controlador";
            $controlador = new $nombreControlador();
            if (!method_exists($controlador, $accion)){
                $error = 'No existe la accion '. $accion . 'en el controlador' .  $nombreControlador; 
                
                $controlador = 'Inicio'; 
                $controlador = ucwords($controlador). "Controlador";
                $controlador = new $nombreControlador();
                $accion = 'index';
                $controlador->$accion();
                $controlador->setError($error);
                $controlador->index();

            } else {
                $error="No existe la ruda dada: ". $ruta;
                $errorControlador->error($error);
            }

        }else{
            $error="No existe la variable accion";
            $errorControlador->error($error);
        }
    }else{
        $error="No existe la variable controlador";
        $errorControlador->error($error);
    }
}
else{
    $error= "No se encuentra la variable modulo";
    $errorControlador->error($error);
}

