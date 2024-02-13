<?php

namespace App\Http\Controllers;

use App\Models\Careers;
use App\Models\ContactUs;
use App\Models\OurClients;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\EmployeeAccounts;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    
    public function sendinquiry(Request $request){

        $incomingInquiry = $request->validate([

            "firstname" => ['required'],
            "lastname" => ['required'],
            "email" => ['required'],
            "contactnumber" => ['required'],
            "subject" => ['required'],
            "message" => ['required'],


        ]);

        ContactUs::create($incomingInquiry);

        return redirect('/contactus')->with('status', 'Your Inquiry Has Been Sent Successfully, We Will Get In Touch To You As Soon As Possible.');

    }


     //Function to fetch datas in admin dash
     public function adminView(){

        //HAD TO DECLARE OTHER FETCHING DATAS SUCH AS CAREERS, INQUIRES, EMPLOYEES DATA, CLIENTS BECAUSE IM HAVING A UNDEFINED ERROR
        $careers = Careers::paginate(5);

        $inquiries = ContactUs::paginate(4);//Added pagination so the inquiries wont pile up

        $employees = EmployeeAccounts::paginate(5);

        $clients = OurClients::paginate(5);

        return view('admindash', compact('careers', 'inquiries', 'employees', 'clients'));
        
    }



    //To update contact status in database
    public function updateStatus(Request $request, $id){

        //To Validate Request
        $request->validate([

            'contactstatus' => ['required', Rule::in(['Not Yet Replied', 'Replied'])],

        ]);


        //Update status in database 
        ContactUs::where('id', $id)->update(['status' => $request->input('contactstatus')]);

        return redirect('admindash')->with('status', 'Inquiry Status Updated Successfully.');
        
    }



}
