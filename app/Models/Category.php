<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
class Category extends Model
{
    //  
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'category';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nameCate','description','image'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    public function product()
    {
        # code...
        return $this->hasMany('App/Product', 'category_id', 'id');
    }


    static public function getCategory(){
        return self::select('*')->get();
    }


    public static function getCateByName($cateName) {
        return self::where('cateName', $cateName)->first();
    }

    public static function addCate($cateName,$description,$image) {
        self::insert([
            'cateName'=>$cateName,
            'description'=>$description,
            'image'=>$image,
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
