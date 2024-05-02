<?php

namespace App\Http\Controllers;

use App\Models\Careers;
use App\Models\ContactUs;
use App\Models\OurClients;
use Illuminate\Http\Request;
use App\Models\Employee201Form;
use App\Models\EmployeePayslip;
use Illuminate\Validation\Rule;
use App\Models\EmployeeAccounts;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class EmployeeController extends Controller
{

    //Employee Log In Functions
    public function employeelogin(Request $request){

        $incomingFields = $request->validate([

            'employeeusername' => 'required',
            'employeepassword' => 'required'

        ]);

        if (auth()->attempt(['username' => $incomingFields['employeeusername'], 'password' => $incomingFields['employeepassword']], true)) {

            $request->session()->regenerate();
            return redirect("/userdash");

        }

        return redirect('/login')->with('login_error', 'Invalid Credentials');

    }

    //Employee Log Out
    public function logout(){

        auth()->logout();
        return redirect('/login');

    }


    //For Employee Accounts Creation -Admin Side
    public function addemployee(Request $request)
    {
        $incomingFields = $request->validate([
            "fullname" => ['required', Rule::unique('employeeaccounts', 'fullname')],
            "clientdesignation" => ['required'],
            "username" => ['required',],
            "password" => ['required'],
            "confirmpassword" => ['required', 'same:password'],
        ]);

        if ($incomingFields['password'] !== $incomingFields['confirmpassword']) {

            return redirect()->back()->withInput()->withErrors(['password' => 'Password does not match']);

        } else {

            $incomingFields['password'] = bcrypt($incomingFields['password']);
            $employeeAccount = EmployeeAccounts::create($incomingFields);
            auth()->login($employeeAccount);

            return redirect('/admindash')->with('addemployeestatus', 'Employee Account Has Been Added Successfully');

        }
    }


     //Function to fetch datas in admin dash
     //public function employeeview(Request $request){

        //HAD TO DECLARE OTHER FETCHING DATAS SUCH AS CAREERS, INQUIRES, EMPLOYEES DATA, CLIENTS BECAUSE IM HAVING A UNDEFINED ERROR
       // $careers = Careers::paginate(5);

       // $inquiries = ContactUs::paginate(4);//Added pagination so the inquiries wont pile up

       // $employees = EmployeeAccounts::paginate(5);

       // $clients = OurClients::paginate(5);

       // return view('admindash', compact('careers', 'inquiries', 'employees', 'clients'));
  //  }



    //Function to fetch data from Employee201Form and EmployeePayslip
    public function viewEmployeeData()
    {
        //Determine the logged in user
        $user = Auth::user();
        
        //Display employee details per employee Foreign Key ID
        $employeeDetails = Employee201Form::where('employeeaccount_id', $user->id)->first();

        //Display employee payslips per employee Foreign Key ID
        $employeePayslips = EmployeePayslip::where('employeeaccount_id', $user->id)->paginate(10);
        
        return view('userdash', compact('employeeDetails', 'employeePayslips'));
    }


    
    //Function to set status of Employee
    public function updateEmployeeStatus(Request $request, $id){

        //To Validate Request
        $request->validate([

           'status' => ['required', Rule::in(['Set Status', 'Active Duty', 'Resigned', 'Awol', 'Terminated'])]

       ]);

        //Update status in database 
        EmployeeAccounts::where('id', $id)->update(['status' => $request->input('status')]);

        return redirect('admindash')->with('status', 'Employee Status Updated Successfully.');

   }
   

}