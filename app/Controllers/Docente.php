<?php

namespace App\Controllers;
include_once (ROOTPATH.'public\imagenes\translate.php');

class Docente extends BaseController
{

    public function __construct(){
        helper(['url' , 'Form_helper']);
    }

	public function index()
	{
        $db = \Config\Database::connect();
        $usuario = session()->get('InfoUser');
        $docente  =$usuario['Usuario'];
        $paginacion = $db->query('SELECT * FROM view_citas_docente WHERE idDocente='.$docente['intMatricula'].' AND Estado_Cita="Pendiente"');

        $filas= $paginacion->getNumRows();
        $paginas = ceil($filas/5);
        $page=0;
        if(isset($_GET['page'])){
            $page = $_GET['page'] * 5;
        }
        $usuario = session()->get('InfoUser');
        $docente = $usuario['Usuario'];
        $result=$db->query('CALL spGetCitaDocente('.$docente['intMatricula'].','.$page.');');


        $datos = [
            'title'=>'Datos de la cita',
            'info'=>$result->getResult(),
            'paginas'=>$paginas,
            'paginaActual'=>$page,
            'Nombre'=>$docente['vchNombre']." ".$docente['vchAPaterno']." ".$docente['vchAMaterno']
        ];
		return view('docente/index', $datos);
	}

    public function cita(){
        $db = \Config\Database::connect();

        $result=$db->query('CALL spGetArea();')->getResult();
        $result2=$db->query('CALL spGetAlumnos();')->getResult();
        //print_r($result);

        $datos = [
            'title'=>'Datos del area',
            'info'=>$result,
            'alumnos'=>$result2
        ];
        return view('docente/cita', $datos);
    }

    public function addCita(){
        $usuario = session()->get('InfoUser');
        $docente = $usuario['Usuario'];
        $validation= $this->validate([
            'Matricula'=>[
                'rules'=>'required|integer|min_length[8]|max_length[8]|is_not_unique[tblalum_docen.intMatricula]',
                'errors'=>[
                    'required'=>'El campo matricula es obligatorio',
                    'integer'=>'Ingresa solo n??meros',
                    'min_length'=>'Minimo 8 caracteres',
                    'max_length'=>'Maximo 8 caracteres',
                    'is_not_unique'=>'Esta matricula no est?? registrada'
                ]
            ],
            'Fecha'=>[
                'rules'=>'required|valid_date',
                'errors'=>[
                    'required'=>'El campo Fecha es obligatorio',
                    'valid_date'=>'Ingresa una fecha valida'
                ]
            ],
            'Hora'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'El campo Hora es obligatorio'
                ]
            ],
            'Area'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'El campo Area es obligatorio'
                ]
            ]
        ]);

        $db = \Config\Database::connect();

        $result=$db->query('CALL spGetArea();')->getResult();
        $result2=$db->query('CALL spGetAlumnos();')->getResult();
        //print_r($result);

        $datos = [
            'title'=>'Datos del area',
            'info'=>$result,
            'alumnos'=>$result2
        ];

        if(!$validation){
            return view('docente/cita', ['validation'=>$this->validator, 'info'=>$result, 'alumnos'=>$result2]);
        }else{
            $db = \Config\Database::connect();
            $matricula = $this->request->getPost('Matricula');
            $fecha = $this->request->getPost('Fecha');
            $hora = $this->request->getPost('Hora');
            $area = $this->request->getPost('Area');

            $result3 = $db->query('CALL spVerificar("'.$fecha.'","'.$hora.'")');

            if($result3->getNumRows() > 0){
                return view('docente/cita', ['validation'=>$this->validator, 'info'=>$result, 'alumnos'=>$result2, 'mensaje'=>"Ya existe una cita en esa fecha y hora, elija otra."]);
            }else{
                $query = "CALL spAddCita(".$matricula.",".$docente['intMatricula']." , '".$fecha."',".$area.", '".$hora."');";
                $db->query($query);
                return redirect()->to('docente/')->with('success', 'Cita a??adida');
            }
        }
    }

    public function reagendar(){
        
        $db = \Config\Database::connect();
        $idCita = $this->request->getGet('idCita');
        
        $result=$db->query('CALL spGetCita('.$idCita.')')->getResult();

        $datos=[
            'title'=>'Datos cita',
            'Cita'=>$result[0]
        ];
        return view('docente/reagendar', $datos);
    }

    public function updateCita(){
        $db = \Config\Database::connect();
        $validation= $this->validate([
            'Fecha'=>[
                'rules'=>'required|valid_date',
                'errors'=>[
                    'required'=>'El campo Fecha es obligatorio',
                    'valid_date'=>'Ingresa una fecha valida'
                ]
            ],
            'Hora'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'El campo Hora es obligatorio'
                ]
            ]
        ]);
        
        $idCita = $this->request->getPost('idCita');
        $result=$db->query('CALL spGetCita('.$idCita.')')->getResult();
        if(!$validation){
            return view('docente/reagendar', ['validation'=>$this->validator, 'Cita'=>$result[0]]);
        }else{
            $fecha = $this->request->getPost('Fecha');
            $hora = $this->request->getPost('Hora');
            $query = "CALL spReagendar('".$fecha."', '".$hora."',".$idCita.");";
            $result=$db->query($query);

            if(!$result){
               return redirect()->back()->with('fail', 'Algo salio mal');
            }else{
               return redirect()->to('docente/')->with('success', 'Actualizado correctamente');
            }
        }
    }

    public function cancelar(){
        
        $db = \Config\Database::connect();
        $idCita = $this->request->getGet('id');
        $query = "CALL spCancelar(".$idCita.");";
        $result=$db->query($query);

        if(!$result){
            return redirect()->back()->with('fail', 'Algo salio mal');
        }else{
            return redirect()->to('docente/')->with('success', 'Actualizado correctamente');
        }
    }

    public function historial(){
        $usuario = session()->get('InfoUser');
        $docente  =$usuario['Usuario'];
        $db = \Config\Database::connect();
        $paginacion = $db->query('SELECT * FROM view_citas_docente WHERE idDocente='.$docente['intMatricula'].';');

        $filas= $paginacion->getNumRows();
        $paginas = ceil($filas/5);
        $page=0;
        $estado = "Todos";
        if(isset($_GET['page'])){
            $page = $_GET['page'] * 5;
        }

        if(isset($_GET['estado'])){
            $estado = $_GET['estado'];
        }

        $result=$db->query('CALL spGetHistorial('.$docente['intMatricula'].',"'.$estado.'", '.$page.');');

        $datos = [
            'title'=>'Datos de la cita',
            'info'=>$result->getResult(),
            'paginas'=>$paginas,
            'paginaActual'=>$page,
            'estado'=>$estado
        ];
        //print_r($datos);

		return view('docente/historial', $datos);
    }
}


?>