<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $data = Message::orderBy('created_at', 'desc')->get();
        return view('admin.message.index',[
            'MsgData'=>$data,
        ]);
    }

    public function show($id)
    {
        $data = Message::find($id);
        if ($data->status != 'Ignore'){
            $data->status = 'Seen';
            $data->save();
        }

        return view('admin.message.show',[
            'MsgdData'=>$data,
        ]);
    }

    public function showWithoutUpdate($id)
    {
        $data = Message::find($id);
        return view('admin.message.show',[
            'MsgdData'=>$data,
        ]);
    }

    public function update(Request $request, $id)
    {
        $data =Message::find($id);
        $data->note = $request->input('note');
        $data->status = $request->input('status');
        $data->save();

        return redirect(route('admin_message_show_updated',['id'=>$data->id]));

    }


    public function destroy($id)
    {
        $data =Message::find($id);
        $data->delete();

        return redirect(route('admin_message_index'));

    }
}
