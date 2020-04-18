<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
    protected $table = "admin";
    public $timestamps = true;

    protected $fillable = [
        'adminName', 'email', 'password', 'fullname', 'mobile', 'role'
    ];


    static public function checkLogin($adminName,$password){
        return self::where('adminName', $adminName)->where('password', $password)->first();
    }

    //get all 
    static public function getAlladmin(){
        return self::get();
    }

    static public function getAdminById($id){
        return self::where('id',$id)->first();
    }

    static public function findAdminByName($adminName){
        return self::where('adminName',$adminName)->first();
    }



    
}
