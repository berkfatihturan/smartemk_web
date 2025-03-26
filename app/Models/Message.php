<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Message extends Model
{
    use HasFactory;

    public static function countMessage()
    {
        return Message::where('status','=','New')->count();
    }

    public static function isAllowed()
    {
        return True;
    }
}
