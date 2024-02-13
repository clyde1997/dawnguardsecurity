<?php

namespace App\Http\Controllers;

use App\Models\Careers;
use App\Models\ContactUs;
use App\Models\OurClients;
use Illuminate\Http\Request;
use App\Models\EmployeeAccounts;

class OurClientsController extends Controller
{
    
    public function addClient(Request $request){

        
        $incomingField = $request->validate([

            'clientlogo' => 'required|mimes:jpeg,png|max:2048',
            'clientname' => 'required',

        ]);

        $clients = OurClients::create($incomingField);

        //Below if conditional to handle the file upload
        if ($request->hasFile('clientlogo')) {

            $clientLogoUploadFile = $request->file('clientlogo');

            $clientsFileName = 'client_' . time() . '.' . $clientLogoUploadFile->getClientOriginalExtension();
    
            $clientLogoUploadFile->move(public_path('clientlogos'), $clientsFileName);//Move The Uploaded File to public/employeedocuments/ directory

            $clients->update(['clientlogo' => $clientsFileName]);//Sending data file to database

        }
        
        return redirect('admindash')->with('clientstatus', 'Client Has Been Added Successfully');

    }


     //Function to fetch datas in admin dash
     public function clientView(Request $request){

        //HAD TO DECLARE OTHER FETCHING DATAS SUCH AS CAREERS, INQUIRES, EMPLOYEES DATA, CLIENTS BECAUSE IM HAVING A UNDEFINED ERROR
        $careers = Careers::paginate(5);

        $inquiries = ContactUs::paginate(4);//Added pagination so the inquiries wont pile up

        $employees = EmployeeAccounts::paginate(5);

        $clients = OurClients::paginate(5);

        return view('admindash', compact('careers', 'inquiries', 'employees', 'clients'));
    }

    //Function to Display Added Clients in Client Page
    public function clientBladeDisplay(){

        $clients = OurClients::paginate(10);

        return view('ourclients', compact('clients'));

    }


    public function deleteClient($id){

        $careers = OurClients::find($id);
        $careers->delete();

        return redirect('admindash')->with('delete', 'Client Item Has Been Deleted Successfully');

    }

}
