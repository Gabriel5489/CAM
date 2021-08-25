<?php namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\UsersModel;

class admin extends BaseController{

    public function index(){
        
        return view('Administrador/Admin');
    
    }
    
    public function lis(){
        $UsersModel =new  UsersModel();
        $datos['users']=$UsersModel->orderBy('idUsuario', 'ASC')->findAll();
        return view('Administrador/Admin',$datos);
    
    }

    public function list_user()
    {
        return view('Administrador/ListaUsuarios');
    }

    public function citas()
    {
        return view('Administrador/citas');
    }
    
    public function reportes()
    {
        return view('Administrador/Reportes');
    }
    

}