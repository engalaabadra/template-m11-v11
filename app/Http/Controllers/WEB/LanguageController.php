<?php

namespace App\Http\Controllers\WEB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\Controller;

class LanguageController extends Controller
{

    public function switchLang($lang)
    {
        if (array_key_exists($lang, Config::get('languages'))) {
            session()->put('lang',$lang);
            App::setLocale($lang);
            return redirect()->back();
        }
    }

    public function defaultLang(){
        return view(200, config('app.locale'));
    }

    public function getAllLangs(){
        $getAllLangs=Config::get('languages');
        return view(200, $getAllLangs);
     }

}
