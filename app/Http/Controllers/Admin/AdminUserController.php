<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('admin.user.index', [
            'UsersData' => $data,
        ])->with(['error' => 'Cant connect to Server please refresh the page']);
    }

    public function show($id)
    {
        $data = User::find($id);
        return view('admin.user.show', [
            'userData' => $data,
        ]);
    }

    public function destroy($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect(route('admin_user_index'));
    }
}
