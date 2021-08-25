<?php namespace App\Models;

use CodeIgniter\Model;


class LoginModel extends Model{

    protected $table      = 'tblusuario';
    protected $primaryKey = 'idUsuario';
    protected $returnType = 'array';
    
    protected $allowedFields = ['vchUsuario','vchContraseña','idTipo'];


    public function getUserBy(string $colum, string $value){
        return $this->where($colum, $value)->first();
        
    }
}