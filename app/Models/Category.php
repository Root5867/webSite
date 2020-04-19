<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    //  
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "categories" ;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cateName','description','image'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    public function products()
    {
        # code...
        return $this->hasMany('App/Product', 'category_id', 'id');
    }

    public static function getCategories() {
    	return self::select('*')->get(); 	
    }


    //select cate by name
    public static function getCateByName($cateName) {
        return self::where('cateName', $cateName)->first();
    }

    public static function getCateByNameDifId($id,$cateName) {
        return self::where('cateName', $cateName)->where('id','!=',$id)->first();
    }


    public static function addCate($cateName,$description,$image) {
        self::insert([
            'cateName'=>$cateName,
            'description'=>$description,
            'image'=>$image,
            // 'status'=>1,
            'created_at'=>date('Y-m-d H:i:s')
        ]);
    }

    // public static function addCate($cateName) {
    //     self::insert([
    //         'cateName'=>$cateName
    //     ]);
    // }


    public static function addCatego($cateName) {
        self::insert([
            'cateName'=>$cateName,
            'created_at'=>date('Y-m-d H:i:s')
        ]);
    }

    public static function updateCate($id, $cateName, $description, $image) {
        self::where('id', $id)
            ->update([
            'cateName'=>$cateName,
            'description'=>$description,
            'image'=>$image,
            'updated_at'=>date('Y-m-d H:i:s')
            ]);
    }

    public static function deleteCate($id) {
        self::where('id', $id)->delete();
    }
}
