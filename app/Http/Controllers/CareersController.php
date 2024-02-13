<?php

namespace App\Http\Controllers;

use App\Models\Careers;
use App\Models\ContactUs;
use App\Models\OurClients;
use Illuminate\Http\Request;
use App\Models\EmployeeAccounts;
use Illuminate\Support\Facades\DB;

class CareersController extends Controller
{
    public function addCareers(Request $request){

        $incomingFields = $request->validate([

            "positiontitle" => ['required'],
            "location" => ['required'],
            "jobdescription" => ['required'],
            "qualifications1" => ['required'],
            "qualifications2" => ['required'],
            "qualifications3" => ['required'],
            "qualifications4" => ['required'],
            "qualifications5" => ['required'],
            "qualifications6" => ['required'],
            "qualifications7" => ['required'],
            "qualifications8" => ['required'],

        ]);

        Careers::create($incomingFields);

        return redirect('/admindash')->with('statusforcareer', 'Career Has Been Added Successfully');

    }

     //Function to fetch datas in admin dash
     public function viewAdminCareers(){

        //HAD TO DECLARE OTHER FETCHING DATAS SUCH AS CAREERS, INQUIRES, EMPLOYEES DATA, CLIENTS BECAUSE IM HAVING A UNDEFINED ERROR
        $careers = Careers::paginate(5);

        $inquiries = ContactUs::paginate(4);//Added pagination so the inquiries wont pile up

        $employees = EmployeeAccounts::paginate(5);

        $clients = OurClients::paginate(5);

        return view('admindash', compact('careers', 'inquiries', 'employees', 'clients'));


    }

    //Function to display added careers in Careers Blade View
    public function showingCareersPage(){

        $careers = Careers::paginate(5);

        return view('careers', compact('careers'));

    }
    

    public function deleteCareer($id){

        $careers = Careers::find($id);
        $careers->delete();

        return redirect('admindash')->with('delete', 'Career Item Has Been Deleted Successfully');

    }

}
