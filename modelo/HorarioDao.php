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

    // public function ActualizarDocente(DocentesBean $objDocentes){
    //     try {
    //         $sql="UPDATE docentes SET nombresDocente='$objDocentes->Nombre', apellidosDocente='$objDocentes->Apellido',correoDocente='$objDocentes->Correo' WHERE idDocente='$objDocentes->IdDocente'";
            
    //         $objc=new ConexionBD();
    //         $cn=$objc->getConexionBD();
    //         $rs=mysqli_query($cn,$sql);
    //         mysqli_close($cn);
    //     } catch (Exception $e) {
    
    //     }
    //     return $rs;
    // }

    // public function EliminarDocente(DocentesBean $objDocentes){
    //     try {
    //         $sql="DELETE FROM docentes WHERE idDocente='$objDocentes->IdDocente';";
    //         $objc=new ConexionBD();
    //         $cn=$objc->getConexionBD();
    //         $rs=mysqli_query($cn,$sql);
    //         mysqli_close($cn);
    //     } catch (Exception $e) {
    
    //     }
    //     return $rs;
    // }

}