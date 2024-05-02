<?php

namespace App\Http\Controllers;

use App\Models\Careers;
use App\Models\ContactUs;
use App\Models\OurClients;
use Illuminate\Http\Request;
use App\Models\EmployeeAccounts;

class AdminDashDisplayingDatasController extends Controller
{
    
     //Function to fetch datas in admin dash
     public function adminDisplayDatasView(Request $request){

        //HAD TO DECLARE OTHER FETCHING DATAS SUCH AS CAREERS, INQUIRES, EMPLOYEES DATA, CLIENTS BECAUSE IM HAVING A UNDEFINED ERROR
        $careers = Careers::paginate(5);//For Careers Fetching Datas

        $inquiries = ContactUs::paginate(4);//For Inquiries Fetching Datas

        $employeesDropDowns = EmployeeAccounts::all();//For Employees Drop Downs in forms, specifically in sending payslips and filling out 201 forms

        

        $clients = OurClients::query();//For Clients Fetching Datas, I've used ::query for the search function
        
        //Conditional statement for client search
        if($request->filled('clientSearch')){

            //clientname = client column clientname from OurClients Model
            $clients->where('clientname', 'like', '%' . $request->clientSearch . '%');

        }

        //declared variable $clients again for the pagination of the client records
        $clients = $clients->paginate(5);



        $employees = EmployeeAccounts::query();//For Employees Fetching Datas, I've used ::query for the search function

        //Conditional statement for employee search
        if($request->filled('employeeSearch')){

              //clientname = employee column fullname from EmployeeAccounts Model
            $employees->where('fullname', 'like', '%' . $request->employeeSearch . '%')
                        ->orWhere('clientdesignation', 'like', '%' . $request->employeeSearch . '%');
        }

        //declared variable $employees again for the pagination of the employee records
        $employees = $employees->paginate(5);


        return view('admindash', compact('careers', 'inquiries', 'employees', 'clients', 'employeesDropDowns'));

    }



}
