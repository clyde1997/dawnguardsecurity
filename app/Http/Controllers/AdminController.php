<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminAccount;

class AdminController extends Controller
{
    public function adminlogin(Request $request){

        $incomingFields = $request->validate([
            'adminname' => 'required',
            'adminpassword' => 'required'
        ]);
    
        //Had to add auth('admins') to make sure auth recognizes my admin codes inside auth.php
        if(auth('admins')->attempt(['admin_username' => $incomingFields['adminname'], 'password' => $incomingFields['adminpassword']], true)){
    
            $request->session()->regenerate();
            return redirect("/admindash");
    
        }
    

        return redirect('/loginAdmin')->with('login_error', 'Invalid Credentials');
    }





    public function logout(){

        auth('admins')->logout();
        return redirect('/loginAdmin');
    
    }
}



