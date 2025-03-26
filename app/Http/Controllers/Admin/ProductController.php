<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function brandsIndex()
    {
        $brandsList = Brands::all();
        return view('admin.brands.index',[
            'brandsList' => $brandsList
        ]);
    }

    public function brandsCreate()
    {
        return view('admin.brands.create',[

        ]);
    }

    public function brandsStore(Request $request)
    {
        $data = new Brands();
        $data->name = $request->name;
        $data->main_color = $request->main_color;
        $data->second_color = $request->second_color;
        $data->keywords = $request->keywords;
        $data->description = $request->description;
        $data->content = $request->input('content');


        if ($request->file('logo')){
            $data->logo = $request->file('logo')->storeAs('public/brands/logo',$request->file('logo')->getClientOriginalName());
        }

        if ($request->file('icon')){
            $data->icon = $request->file('icon')->storeAs('public/brands/icon',$request->file('icon')->getClientOriginalName());
        }

        if ($request->file('image')){
            $data->image = $request->file('image')->storeAs('public/brands/image',$request->file('image')->getClientOriginalName());
        }

        if ($request->file('background_image')){
            $data->background_image = $request->file('background_image')->storeAs('public/brands/background_image',$request->file('background_image')->getClientOriginalName());
        }

        $data->save();
        return redirect(route('admin_brands_index'));
    }

    public function brandsEdit($id)
    {
        $brandData = Brands::find($id);
        return view('admin.brands.create',[
            'brandData' => $brandData
        ]);
    }

    public function brandsUpdate(Request $request,$id)
    {
        $data = Brands::find($id);
        $data->name = $request->name;
        $data->main_color = $request->main_color;
        $data->second_color = $request->second_color;
        $data->keywords = $request->keywords;
        $data->description = $request->description;
        $data->content = $request->input('content');

        if ($request->file('logo')){
            $data->logo = $request->file('logo')->storeAs('public/brands/logo',$request->file('logo')->getClientOriginalName());
        }

        if ($request->file('icon')){
            $data->icon = $request->file('icon')->storeAs('public/brands/icon',$request->file('icon')->getClientOriginalName());
        }

        if ($request->file('image')){
            $data->image = $request->file('image')->storeAs('public/brands/image',$request->file('image')->getClientOriginalName());
        }

        if ($request->file('background_image')){
            $data->background_image = $request->file('background_image')->storeAs('public/brands/background_image',$request->file('background_image')->getClientOriginalName());
        }

        $data->save();
        return redirect(route('admin_brands_index'));
    }

    public function index()
    {
        $productList = Products::all();
        return view('admin.products.index',[
            'productList' => $productList
        ]);
    }

    public function create()
    {
        return view('admin.products.create',[
            'brandsList' => Brands::all(),
        ]);
    }


    public function store(Request $request)
    {
        $data = new Products();
        $data->name = $request->name;
        $data->type_id = $request->type_id;
        $data->brand_id = $request->brand_id;
        $data->keywords = $request->keywords;
        $data->description = $request->description;
        $data->content = $request->input('content');


        if ($request->file('image')){
            $data->image = $request->file('image')->storeAs('public/products/image',$request->file('image')->getClientOriginalName());
        }

        if ($request->file('file_1')){
            $data->document_1 = $request->file('file_1')->storeAs('public/products/file_1',$request->file('file_1')->getClientOriginalName());
        }

        if ($request->file('file_2')){
            $data->document_2 = $request->file('file_2')->storeAs('public/products/file_2',$request->file('file_2')->getClientOriginalName());
        }

        $data->save();
        return redirect(route('admin_products_index'));
    }

    public function edit($id)
    {
        $productData = Products::find($id);
        return view('admin.products.create',[
            'productData' => $productData,
            'brandsList' => Brands::all(),
        ]);
    }

    public function update(Request $request,$id)
    {
        $data = Products::find($id);
        $data->name = $request->name;
        $data->type_id = $request->type_id;
        $data->brand_id = $request->brand_id;
        $data->keywords = $request->keywords;
        $data->description = $request->description;
        $data->content = $request->input('content');


        if ($request->file('image')){
            $data->image = $request->file('image')->storeAs('public/products/image',$request->file('image')->getClientOriginalName());
        }

        if ($request->file('file_1')){
            $data->document_1 = $request->file('file_1')->storeAs('public/products/file_1',$request->file('file_1')->getClientOriginalName());
        }

        if ($request->file('file_2')){
            $data->document_2 = $request->file('file_2')->storeAs('public/products/file_2',$request->file('file_2')->getClientOriginalName());
        }

        $data->save();
        return redirect(route('admin_products_index'));
    }



    public function homeShow($id)
    {
        $productData = Products::find($id);
        return view('home2.products.show',[
            'productData' => $productData,
        ]);
    }


}
