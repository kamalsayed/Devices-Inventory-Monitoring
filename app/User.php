<?php
namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
//fillable
    protected $fillable = ['username' , 'password'];
    
    //hidden
    protected $hidden = ['password'];

    protected function validation(array $data){
        return Validator::make($data , 
        ['username' => 'required|max:50',
        'password' => 'required|min:6|confirmed']);
    }






}














?>