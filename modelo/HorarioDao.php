<?php

require_once 'HorarioBean.php';                                                //importo la direccion para usar metodos
require_once '../util/Conexion_BD.php';                                         //importo la direccion para usar metodos para la conexion a la base de datos

class HorarioDao{

    public function guardarHorario(HorarioBean $objHorario){
        try{
            $sql = "INSERT INTO horario(codCurso, idDocente, escuela, Ciclo, aula, seccion, diaClases, horaInicio, horaFin) VALUES('$objHorario->codCurso','$objHorario->idDocente','$objHorario->escuela', '$objHorario->Ciclo', '$objHorario->aula','$objHorario->seccion','$objHorario->diaClases','$objHorario->horaInicio','$objHorario->horaFin')";

            $objc=new ConexionBD();
            $cn=$objc->getConexionBD();
            $rs=mysqli_query($cn,$sql);
            mysqli_close($cn);
        }catch (Exception $e){

        }
        return $rs;
    }

    public function ActualizarHorario(HorarioBean $objHorario){
        try {
            $sql="UPDATE horario SET codCurso='$objHorario->codCurso', idDocente='$objHorario->idDocente', escuela='$objHorario->escuela', Ciclo='$objHorario->Ciclo', aula='$objHorario->aula', seccion='$objHorario->seccion', diaClases='$objHorario->diaClases', horaInicio='$objHorario->horaInicio', horaFin='$objHorario->horaFin' WHERE N='$objHorario->N'";

            $objc=new ConexionBD();
            $cn=$objc->getConexionBD();
            $rs=mysqli_query($cn,$sql);
            mysqli_close($cn);
        } catch (Exception $e) {
    
        }
        return $rs;
    }

    public function EliminarHorario(HorarioBean $objHorario){
        try {
            $sql="DELETE FROM horario WHERE N='$objHorario->N';";
            $objc=new ConexionBD();
            $cn=$objc->getConexionBD();
            $rs=mysqli_query($cn,$sql);
            mysqli_close($cn);
        } catch (Exception $e) {
    
        }
        return $rs;
    }

    // Función para obtener horarios por escuela con JOIN
    public function obtenerHorariosPorEscuela($escuela) {
        try {
            $sql = "SELECT h.*, d.nombresDocente, d.apellidosDocente, c.nombreCurso
                    FROM horario h
                    JOIN docentes d ON h.idDocente = d.idDocente
                    JOIN cursos c ON h.codCurso = c.codCurso
                    WHERE h.escuela = '$escuela'";
            
            $objCnx = new ConexionBD();
            $cn = $objCnx->getConexionBD();
            $result = mysqli_query($cn, $sql);
            $horarios = [];

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $horarios[] = $row;
                }
            }

            mysqli_close($cn);
        } catch (Exception $e) {
            return null;
        }
        return $horarios;
    }

}