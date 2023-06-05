<?php
include_once "Error/Error/Vistas/VistaError.php";
include_once "clases/pagina.php";

class ErrorControlador
{
    private 
        $pagina,
        $error;

    public function __CONSTRUCT()
    {   
        $this->pagina = new Pagina("Error");
    }


    public function setError($error)
    {
        $this->error=$error;
    }

    public function error($error)
    {
        $this->error=$error;
        $this->pagina->inicializaEncabezado("clases/html/encabezadoExterno.php");
        $vista = new VistaError();
        $vista->template($error);
        $this->pagina->setMensaje($error);
        $this->pagina->inicializaPie("clases/html/pieExterno.php");
    }
}
