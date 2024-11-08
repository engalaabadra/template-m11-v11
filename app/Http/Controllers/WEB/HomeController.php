<?php

namespace App\Http\Controllers\WEB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use Barryvdh\Debugbar\Facades\Debugbar;
 

class HomeController extends Controller
{
     
    
    /**
     * HomeController constructor.
     *
     * @param BannerResourceController $bannerController
     */
    public function __construct()
    {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        return view("home");
       
        // Debugbar::error('alaa err');
    }



}
