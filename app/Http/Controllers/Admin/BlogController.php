<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $blogList = Blogs::all();
        return view('admin.blogs.index',[
            'blogList' => $blogList
        ]);
    }

    public function create()
    {
        $blogList = Blogs::all();

        return view('admin.blogs.create',[
            'blogList' => $blogList
        ]);
    }

    public function store(Request $request)
    {
        $blog = new Blogs();
        $blog->title = $request->title;
        $blog->subject = $request->subject;
        $blog->description = $request->description;
        $blog->keywords = $request->keywords;
        $blog->content = $request->input('content');

        if ($request->file('image')){

            $blog->image = $request->file('image')->storeAs('public/blogs',$request->file('image')->getClientOriginalName());
        }

        $blog->save();
        return redirect(route('admin_blogs_index'));

    }

    public function edit($id)
    {
        $blogData = Blogs::find($id);

        return view('admin.blogs.create',[
            'blogData' => $blogData
        ]);
    }

    public function update($id,Request $request)
    {
        $blog = Blogs::find($id);
        $blog->title = $request->title;
        $blog->subject = $request->subject;
        $blog->description = $request->description;
        $blog->keywords = $request->keywords;
        $blog->content = $request->input('content');

        if ($request->file('image')){
            $blog->image = $request->file('image')->storeAs('public/blogs',$request->file('image')->getClientOriginalName());
        }

        $blog->save();
        return redirect(route('admin_blogs_index'));

    }

    public function destroy($id)
    {
        $data =Blogs::find($id);
        $data->delete();

        return redirect(route('admin_blogs_index'));

    }
}
