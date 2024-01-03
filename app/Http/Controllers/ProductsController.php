<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
           
    }
    public function allproduct(){
        $products = Products::all();
        return view('products.allproduct', compact('products'));
     }
}