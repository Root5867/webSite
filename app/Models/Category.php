<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

}
