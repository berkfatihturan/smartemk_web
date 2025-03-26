<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Message;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;
use function Laravel\Prompts\error;

class HomeController extends Controller
{
    function index()
    {
        return view('home.index');
    }

    function index2()
    {
        return view('home2.index');
    }

    function deneme()
    {
        return view('admin.index');
    }

    function ckeditor($type,$id)
    {
        if ($type == "brand"){
            $brand = Brands::find($id);
            return view('home.components.ckeditor',['content' => $brand->content]);
        }

    }


    function contactus()
    {
        return view('home2.contactus');
    }


    function aboutus()
    {
        return view('home2.aboutus');
    }

    function referanslar()
    {
        return view('home2.referanslarımız');
    }




    public function storemessage(Request $request){
        try {
            // Yeni mesaj nesnesi oluştur
            $data = new Message();
            $data->name = $request->input('name');
            $data->email = $request->input('email');
            $data->phone = $request->input('phone'); // Eğer telefon alanı varsa
            $data->subject = $request->input('subject');
            $data->message = $request->input('message');
            $data->ip = $request->ip(); // Kullanıcının IP adresini al
            $data->save();

            // Başarı mesajını JSON olarak döndür
            return response()->json([
                'success' => true,
                'message' => 'Your message has been sent successfully!'
            ], 200);

        } catch (Exception $e) {
            // Hata log kaydı (Geliştirme ve hata ayıklama için)
            Log::error('Message storing error: ' . $e->getMessage());

            // Hata mesajını JSON olarak döndür
            return response()->json([
                'success' => false,
                'message' => 'Failed to send message. Please try again later.'
            ], 500);
        }
    }
}
