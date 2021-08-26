<?php namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\LoginModel;
use App\Libraries\Hash;

class LoginController extends BaseController{

    public function __construct(){
        helper(['url' , 'Form']);
    }

    public function index()
    {
      
        return view('auth/login');
    }

    public function salir(){
        $session = session();

        $session ->destroy();
        session()->setFlashdata('success', 'Has cerrado sesión');
        return redirect()->to(base_url('LoginController'));

        
    }

    public function entrar(){
        $validation = $this->validate([
            'Usuario'=>[
                'rules'=>'required|is_not_unique[tblusuario.vchUsuario]',
                'errors'=>[
                    'required'=>'El campo Usuario es obligatorio',
                    'is_not_unique'=> 'El usuario no existe en el sistema'
                    
                ]
            ],

            'Contraseña'=>[
                'rules'=>'required|min_length[5]|max_length[15]',
                'errors'=>[
                    'required'=>'El campo Contraseña es obligatorio',
                    'min_length'=>'Minimo 5 caracteres',
                    'max_length'=>'Maximo 15 caracteres'
                ]
            ],
            
        ]);
        if(!$validation){
            return view('auth/login', ['validation'=>$this->validator]);

        }else{
            
            $usuario = $this->request->getPost('Usuario');
            $contr = $this->request->getPost('Contraseña');

            $model = new \App\Models\LoginModel();
            $user_info =$model->where('vchUsuario', $usuario)->first();
            $check_password = Hash::check($contr, $user_info['vchContraseña']);

            if(!$check_password){
                session()->setFlashdata('fail', 'Contraseña incorrecta');
                return redirect()->to('LoginController')->withInput();

            }else{
                $user_tipo = $user_info['idTipo'];
                $modelUser = new \App\Models\UserModel();
                $docente =$modelUser->where('idUsuario', $user_info['idUsuario'])->first();
                $data = [
                    'tipo'=>$user_tipo,
                    'Usuario'=>$docente
                ];
                session()->set('InfoUser', $data);
                if($user_tipo == 1){
                    return redirect()->to('admin');
                }
                if($user_tipo == 2){
                    return redirect()->to('Docente');
                }
                if($user_tipo == 3){
                    return redirect()->to('Alumno');
                }

                }
            
        }

            
        }
     
    }

    
