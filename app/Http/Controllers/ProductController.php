<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function getIndex(){
        $product = new Product();
        $prods = $product::getAllProduct();
        return view('admin/Product/index',compact('prods'));
    }


    // public function
}
