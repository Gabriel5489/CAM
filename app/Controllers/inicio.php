<?php namespace App\Controllers;
use App\Models\UsersModel;

class inicio extends BaseController{

    public function index()
    {
        
        return view('auth/inicio');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function registro()
    {
        return view('auth/register');
    }
    
    public function admin()
    {
        return view('Administrador/Admin');
    
    }
    
    
}
