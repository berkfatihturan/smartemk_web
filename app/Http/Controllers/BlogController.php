<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    function index()
    {
        $blogList = Blogs::orderBy('created_at', 'desc')->get();
        return view('home.blogs.index',[
            'blogList' => $blogList
        ]);
    }

    function show($id)
    {
        $blogData = Blogs::find($id);
        return view('home.blogs.show',[
            'blogData' => $blogData
        ]);
    }
}
