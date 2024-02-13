<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    
    public function index(){

        return view('index');

    }

    public function login(){

        return view('login');

    }

    public function loginAdmin(){

        return view('loginAdmin');

    }

    public function userdash(){

        return view('userdash');

    }

    
    public function ourclients(){

        return view('ourclients');

    }

    public function contactus(){

        return view('contactus');

    }

    public function careers(){

        return view('careers');

    }

    public function admindash(){

        return view('admindash');

    }

    public function aboutus(){

        return view('aboutus');

    }


}
