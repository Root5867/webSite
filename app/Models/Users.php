<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    public static function getUser(){
        return self::select('*')->first();
    }

    public static function getUserById($id){
        return self::where('id',$id)->first();
    }

    public static function deleteUSer($id){
        return self::where('id',$id)->delete();
    }

    static public function findUserByUsername($username) {
    	return self::where('username', $username)->first();
    }

}
