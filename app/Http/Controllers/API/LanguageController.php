<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class LanguageController extends Controller
{
    public function switchLang($lang)
    {
        if (array_key_exists($lang, Config::get('languages'))) {
            Storage::put('applocale', $lang);
            app()->setLocale(Storage::get('applocale'));
            return successResponse(0, config('app.locale'));
        }
    }
 
    public function defaultLang(){
        return successResponse(0, config('app.locale'));
    }
    
    public function getAllLangs(){
        $getAllLangs=Config::get('languages');
        return successResponse(0, $getAllLangs);
     }
   
}
    