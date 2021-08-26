<?php

namespace App\Controllers;
use \Statickidz\GoogleTranslate;

class Alumno extends BaseController
{
    public function index()
    {

        $db = \Config\Database::connect();
        $usuario = session()->get('InfoUser');
        $alumno = $usuario['Usuario'];

        $result=$db->query('CALL spGetCitaAlumno('.$alumno['intMatricula'].');')->getResult();

        $datos = [
            'title'=>'Datos de la cita',
            'info'=>$result,
            'Alumno'=>$alumno
        ];
        //print_r($datos);

		return view('alumno/index.php', $datos);
    }

}


?>