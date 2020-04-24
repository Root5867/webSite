<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
     //
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['proName','description','unit_price','promotion_price','ProductImage'];
    
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    public function category(){
        //
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }

    static public function getAllProduct(){
        return self::select('*')->get(); 
    }

    static public function getProductById($id){
        return self::where('id',$id)->first();
    }
    //select product by name
    public static function getProByName($proName) {
        return self::where('proName', $proName)->first();
    }

    static public function getProductByName($proName){
        return self::where('proName',$proName)->first();
    }

    static public function deletePro($id){
        return self::where('id',$id)->delete();
    }
    
    public static function AddProduct( $proName, $description, $category_id, $unit_price, $promotion_price, $ProductImage,$poster) {
    	self::insert([
    		'proName'=>$proName,
            'description'=>$description,
            'category_id'=>$category_id,
    		'unit_price'=>$unit_price,
    		'promotion_price'=>$promotion_price,
            'ProductImage'=>$ProductImage,
            'poster'=>$poster,
    		'created_at'=>date('Y-m-d H:i:s')
    	]);
    }

    public static function updateProject($id, $proName, $description, $category_id,$unit_price, $promotion_price, $image, $unit, $new) {
        self::where('id', $id)
            ->update([
            'proName'=>$proName,
            'description'=>$description,
            'category_id'=>$category_id,
            'unit_price'=>$unit_price,
            'promotion_price'=>$promotion_price,
            'image'=>$image,
            'unit'=>$unit,
            'new'=>$new,
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
    }

    public static function deleteProduct($id){
        return self::where('id',$id)->delete();
    }

    public static function getAllProductByCate($category_id){
        return self::where('category_id', $category_id)->paginate(12);
    }
}
