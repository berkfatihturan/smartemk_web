<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PagesController extends Controller
{
    public function index()
    {
        return view('admin.pages.index');
    }

    public function create(Request $request)
    {
        $page = Pages::find(1);
        if (!$page){
            $page = new Pages();
            $page->id = 1;
        }

        $page->name = $request->title;
        $page->content = $request->input('content');

        if ($request->file('image')){
            Storage::delete($data->image);
            $data->image = $request->file('image')->storeAs('public/pages',$request->file('image')->getClientOriginalName());
        }

        $page->save();


    }
}
