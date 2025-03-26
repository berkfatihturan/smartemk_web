<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    public static function getSettingValue()
    {
        $data=Settings::first();

        if ($data==null){
            $data = new Settings();
            $data->save();
            $data = Settings::first();
        }

        //only local server
        //$data->api_server_address = "http://192.168.1.221:8080/ws-example";

        return $data;
    }
}
