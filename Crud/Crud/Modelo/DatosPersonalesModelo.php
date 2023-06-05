<?php
require_once "Conexiones/ConexionBD.php";
class DatosPersonalesModelo{
    private $conexion, $status, $mensaje, $lugarDeError, $datos,
            $clave, $obtenerpor, $id, $nombre, $apm, $app, $telefono;
    
    public function __CONSTRUCT()
    {
        try{
            $this->conexion = Conexion::IniciarConexion();
            $this->status = TRUE;
        }catch (Exception $e){
            $this->status = FALSE;
            $this->mensaje = 'Error al conectarse a la BD: '. $this->lugarDeError. 'codigo';
        }
        $this->lugarDeError='';
    }
    public function setStatus($status){$this->clave = $status;}
    public function getStatus(){return $this->status;}

    public function setMensaje($mensaje){$this->clave = $mensaje;}
    public function getMensaje(){return $this->mensaje;}

    public function setLugarDeError($lugarDeError){$this->clave = $lugarDeError;}
    public function getLugarDeError(){return $this->lugarDeError;}


    public function setId ($id){$this->id = $id;}
    public function getId(){return $this->id;} 

    public function setNombre ($nombre){$this->nombre = $nombre;}
    public function getNombre(){return $this->nombre;}

    public function setapm ($apm){$this->apm = $apm;}
    public function getapm(){return $this->apm;}

    public function setapp ($app){$this->app = $app;}
    public function getapp(){return $this->app;}

    public function setTelefono ($telefono){$this->telefono = $telefono;}
    public function getTelefono(){return $this->telefono;}
    
    public function obtenerDatos()
    {
        $this-> datos = (object) array('registros' => NULL);
        try{
            $sql = "SELECT * FROM registros";
            $consulta = $this->conexion->prepare($sql);
            $consulta->execute();
            $errores = $consulta->errorInfo();
            if ($errores[0]== 0000)
            {
                $this->status = TRUE;
                $this->datos = $consulta->fetchAll(PDO::FETCH_OBJ);
            }else{
                throw new Exception($errores[2]);
            }
        }
        catch (PDOException $e){
            $this->status = FALSE;
            $this->mensaje= 'Error al obtener la informacion: '. $this->lugarDeError. 'codigo'. $e->getCode() . 'Modelo linea'. $e->getLine();
        }
        catch (Exception $e)
        {
            $this->status=FALSE;
            $this->mensaje=$e->getMessage();
        }
        return $this->datos;
    }
    public function insertarDatos($id, $nombre, $apm, $app, $telefono)
    {
        try {
            $sql = "INSERT INTO registros (id, nombre, apm, app, telefono) 
            VALUES (:id, :nombre, :apm, :app, :telefono)";
            $consulta = $this->conexion->prepare($sql);
            $consulta->bindParam(':id', $id);
            $consulta->bindParam(':nombre', $nombre);
            $consulta->bindParam(':apm', $apm);
            $consulta->bindParam(':app', $app);
            $consulta->bindParam(':telefono', $telefono);

            $consulta->execute();
            $errores = $consulta->errorInfo();
            if ($errores[0] == "00000") {
                $this->status = TRUE;
                $this->mensaje = "Datos insertados correctamente.";
            } else {
                throw new Exception($errores[2]);
            }
        } catch (PDOException $e) {
            $this->status = FALSE;
            $this->mensaje = 'Error al insertar los datos: ' . $e->getMessage() . ' en el modelo línea ' . $e->getLine();
        } catch (Exception $e) {
            $this->status = FALSE;
            $this->mensaje = $e->getMessage();
        }
    }

    public function actualizarDatos($id, $nombre, $apm, $app, $telefono)
    {
        try {
            $sql = "UPDATE registros SET nombre = :nombre, apm = :apm, app = :app, telefono = :telefono WHERE id = :id";
            $consulta = $this->conexion->prepare($sql);
            $consulta->bindParam(':nombre', $nombre);
            $consulta->bindParam(':apm', $apm);
            $consulta->bindParam(':app', $app);
            $consulta->bindParam(':telefono', $telefono);
            $consulta->bindParam(':id', $id);
            $consulta->execute();
            $errores = $consulta->errorInfo();
            if ($errores[0] == "00000") {
                $this->status = TRUE;
                $this->mensaje = "Datos actualizados correctamente.";
            } else {
                throw new Exception($errores[2]);
            }
        } catch (PDOException $e) {
            $this->status = FALSE;
            $this->mensaje = 'Error al actualizar los datos: ' . $e->getMessage() . ' en el modelo línea ' . $e->getLine();
        } catch (Exception $e) {
            $this->status = FALSE;
            $this->mensaje = $e->getMessage();
        }
    }


    public function eliminarDatos($id)
    {
        try {
            $sql = "DELETE FROM registros WHERE id = :id";
            $consulta = $this->conexion->prepare($sql);
            $consulta->bindParam(':id', $id);
            $consulta->execute();
            $errores = $consulta->errorInfo();
            if ($errores[0] == "00000") {
                $this->status = TRUE;
                $this->mensaje = "Registro eliminado correctamente.";
            } else {
                throw new Exception($errores[2]);
            }
        } catch (PDOException $e) {
            $this->status = FALSE;
            $this->mensaje = 'Error al eliminar el registro: ' . $e->getMessage() . ' en el modelo línea ' . $e->getLine();
        } catch (Exception $e) {
            $this->status = FALSE;
            $this->mensaje = $e->getMessage();
        }
    }


} 