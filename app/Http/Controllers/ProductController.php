<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($id)
    {
        $brand = Brands::find($id);
        return view('home2.brands.index2',[
            'brand' => $brand
        ]);
    }


    public function sorters(){
        $brand = Brands::find(1);
        return view('home2.brands.sorters',[
            'brand' => $brand
        ]);
    }

    public function mdr(){
        $brand = Brands::find(1);
        return view('home2.brands.motors',[
            'brand' => $brand
        ]);
    }

    public function controller(){
        $brand = Brands::find(1);
        return view('home2.brands.controller',[
            'brand' => $brand
        ]);
    }




}
