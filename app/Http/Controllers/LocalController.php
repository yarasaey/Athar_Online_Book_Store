<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

//use Symfony\Component\HttpFoundation\Session\Session;

class LocalController extends Controller
{
    public function change($lang){
        if(in_array($lang,['en','ar'])){
            App::setlocale($lang);
            Session::put('locale',$lang);
            
        }
        return back();

    }
}
