<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee201Form;
use App\Models\EmployeeAccounts;
use Illuminate\Support\Facades\File;

class Employee201FormController extends Controller
{
    
    public function addOrEditEmployeeDetails(Request $request)
    {

        $incomingField = $request->validate([

            'employeeaccount_id' => ['required'],
            'employeename'  => ['required'],
            'employeeaddress'  => ['required'],
            'employeeposition'  => ['required'],
            'employeecontact'  => ['required'],
            'employeeemail'  => ['required'],
            'employeeage'  => ['required'],
            'gender'  => ['required'],
            'employeebirthdate'  => ['required'],
            'employeebirthplace'  => ['required'],
            'employeereligion'  => ['required'],
            'employeecivilstatus'  => ['required'],
            'employeelicense'  => ['required'],
            'dateofexpiration'  => ['required'],
            'employeefathername'  => ['required'],
            'employeemothername'  => ['required'],
            'employeespousename'  => ['required'],
            'employeerelativename'  => ['required'],
            'employeerelativenumber'  => ['required'],
            'employeesss'  => ['required'],
            'employeephilhealth'  => ['required'],
            'employeetin'  => ['required'],
            'employeepagibig'  => ['required'],
            'uploadpic' => 'required|image',
            'change_signature' => 'required|image',
            'hsnameofschool'  => ['required'],
            'hscoursedegree'  => ['required'],
            'hsyearcompleted'  => ['required'],
            'collegenameofschool'  => ['required'],
            'collegecoursedegree'  => ['required'],
            'collegeyearcompleted'  => ['required'],
            'vocationalnameofschool'  => ['required'],
            'vocationalcoursedegree'  => ['required'],
            'vocationalyearcompleted'  => ['required'],
            'companyname1'  => ['required'],
            'position1'  => ['required'],
            'companyaddress1'  => ['required'],
            'yearsoftenure1'  => ['required'],
            'companyname2'  => ['required'],
            'position2'  => ['required'],
            'companyaddress2'  => ['required'], 
            'yearsoftenure2' => ['required'],
            'companyname3'  => ['required'],
            'position3'  => ['required'],
            'companyaddress3'  => ['required'],
            'yearsoftenure3'  => ['required'],
            'companyname4'  => ['required'],
            'position4'  => ['required'], 
            'companyaddress4'  => ['required'],
            'yearsoftenure4'  => ['required'], 
            'employeeotherdata' => ['required'],


        ]);

        //Retrieving the selected id or specific employee from EmployeeAccounts Model
        $employeeAccount = EmployeeAccounts::findOrFail($request->employeeaccount_id);

        //Creates Employee201 Form instance and associate it with the selected employee account or ID
        $employeeDetails = $employeeAccount->employee201Forms()->create($incomingField);


        if ($request->hasFile('uploadpic')) {

            $imageUploadPic = $request->file('uploadpic');
            $imageNameUploadPic = 'uploadpic_' . time() . '.' . $imageUploadPic->getClientOriginalExtension();//to declare what kind of file type that is uploaded
            $imageUploadPic->move(public_path('employeeimages'), $imageNameUploadPic);//Where to move the image file
        
            //Save image path to the database
            $employeeDetails->update(['uploadpic' => $imageNameUploadPic]);

        }


        //Upload employee image - change_signature
        if ($request->hasFile('change_signature')) {

            $imageChangeSignature = $request->file('change_signature');
            $imageNameChangeSignature = 'change_signature_' . time() . '.' . $imageChangeSignature->getClientOriginalExtension();//to declare what kind of file type that is uploaded
            $imageChangeSignature->move(public_path('employeesignature'), $imageNameChangeSignature);//Where to move the image file

            //Save image path to the database
            $employeeDetails->update(['change_signature' => $imageNameChangeSignature]);

        }


        return redirect('admindash')->with('status', 'Employee Details Uploaded Successfully');



    }


    //Function to view Employe 201 details per Employee ID in admindash
    public function viewEmployeeDetails($id)
    {

        //Find the employee account based on the provided ID, used findorfail in order to determine who's employee who has details or not.
        $employeeAccount = EmployeeAccounts::findOrFail($id);

        //Retrieve the associated Employee201Form and EmployeeAccounts Model
        $employeeDetails = $employeeAccount->employee201Forms;

        return view('employee201details', compact('employeeDetails'));

 
    }


    //Function to update employe 201 details from employee201details view
    public function updateDetails(Request $request, $id){

        $employeeDetails = Employee201Form::find($id);

        if($request->has('employeename')){

            $employeeDetails->employeename = $request->input('employeename');

        }

        if($request->has('employeeaddress')){

            $employeeDetails->employeeaddress = $request->input('employeeaddress');

        }

        if($request->has('employeeposition')){

            $employeeDetails->employeeposition = $request->input('employeeposition');

        }

        if($request->has('employeecontact')){

            $employeeDetails->employeecontact = $request->input('employeecontact');

        }
        
        if($request->has('employeeemail')){

        $employeeDetails->employeeemail = $request->input('employeeemail');

        }

        if($request->has('employeeage')){

            $employeeDetails->employeeage = $request->input('employeeage');

        }

        if($request->has('employeebirthdate')){

        $employeeDetails->employeebirthdate = $request->input('employeebirthdate');

        }

        if($request->has('employeebirthplace')){

        $employeeDetails->employeebirthplace = $request->input('employeebirthplace');

        }

        if($request->has('employeereligion')){

        $employeeDetails->employeereligion = $request->input('employeereligion');

        }

        if($request->has('employeecivilstatus')){

        $employeeDetails->employeecivilstatus = $request->input('employeecivilstatus');

        }

        if($request->has('employeelicense')){

        $employeeDetails->employeelicense = $request->input('employeelicense');

        }

        if($request->has('dateofexpiration')){

        $employeeDetails->dateofexpiration = $request->input('dateofexpiration');

        }

        if($request->has('employeefathername')){

        $employeeDetails->employeefathername = $request->input('employeefathername');

        }

        if($request->has('employeemothername')){

        $employeeDetails->employeemothername = $request->input('employeemothername');

        }

        if($request->has('employeespousename')){

        $employeeDetails->employeespousename = $request->input('employeespousename');

        }

        if($request->has('employeerelativename')){

        $employeeDetails->employeerelativename = $request->input('employeerelativename');

        }

        if($request->has('employeerelativenumber')){

        $employeeDetails->employeerelativenumber = $request->input('employeerelativenumber');

        }

        if($request->has('employeesss')){

        $employeeDetails->employeesss = $request->input('employeesss');

        }


        if ($request->hasFile('uploadpic')) {


            $destinationEmployeeImage = public_path('employeeimages/' . $employeeDetails->uploadpic);


            if(File::exists($destinationEmployeeImage)){

                File::delete($destinationEmployeeImage);

            }

            $imageUploadPic = $request->file('uploadpic');
            $imageNameUploadPic = 'uploadpic_' . time() . '.' . $imageUploadPic->getClientOriginalExtension();//to declare what kind of file type that is uploaded
            $imageUploadPic->move(public_path('employeeimages'), $imageNameUploadPic);

            // Save image path to the database
            $employeeDetails->update(['uploadpic' => $imageNameUploadPic]);
            
        }
        

         // Upload employee image - change_signature
         if ($request->hasFile('change_signature')) {

            $destinationEmployeeSignature = public_path('employeesignature/' . $employeeDetails->change_signature);
            

            if(File::exists($destinationEmployeeSignature)){

                File::delete($destinationEmployeeSignature);

            }

            $imageChangeSignature = $request->file('change_signature');
            $imageNameChangeSignature = 'change_signature_' . time() . '.' . $imageChangeSignature->getClientOriginalExtension();//to declare what kind of file type that is uploaded
            $imageChangeSignature->move(public_path('employeesignature'), $imageNameChangeSignature);

            // Save image path to the database
            $employeeDetails->update(['change_signature' => $imageNameChangeSignature]);

        }


        if($request->has('employeephilhealth')){

        $employeeDetails->employeephilhealth = $request->input('employeephilhealth');

        }

        if($request->has('employeetin')){

        $employeeDetails->employeetin = $request->input('employeetin');

        }

        if($request->has('employeepagibig')){

        $employeeDetails->employeepagibig = $request->input('employeepagibig');

        }

        if($request->has('employeepagibig')){

        $employeeDetails->employeepagibig = $request->input('employeepagibig');

        }

        if($request->has('hsnameofschool')){

        $employeeDetails->hsnameofschool = $request->input('hsnameofschool');

        }

        if($request->has('hscoursedegree')){

        $employeeDetails->hscoursedegree = $request->input('hscoursedegree');

        }

        if($request->has('hsyearcompleted')){

        $employeeDetails->hsyearcompleted = $request->input('hsyearcompleted');

        }

        if($request->has('collegenameofschool')){

        $employeeDetails->collegenameofschool = $request->input('collegenameofschool');

        }

        if($request->has('collegecoursedegree')){

        $employeeDetails->collegecoursedegree = $request->input('collegecoursedegree');

        }

        if($request->has('collegeyearcompleted')){

        $employeeDetails->collegeyearcompleted = $request->input('collegeyearcompleted');

        }

        if($request->has('vocationalnameofschool')){

        $employeeDetails->vocationalnameofschool = $request->input('vocationalnameofschool');

        }

        if($request->has('vocationalcoursedegree')){

        $employeeDetails->vocationalcoursedegree = $request->input('vocationalcoursedegree');

        }

        if($request->has('vocationalyearcompleted')){

        $employeeDetails->vocationalyearcompleted = $request->input('vocationalyearcompleted');
        
        }

        if($request->has('companyname1')){

        $employeeDetails->companyname1 = $request->input('companyname1');

        }

        if($request->has('position1')){

        $employeeDetails->position1 = $request->input('position1');

        }

        if($request->has('companyaddress1')){

        $employeeDetails->companyaddress1 = $request->input('companyaddress1');

        }

        if($request->has('yearsoftenure1')){

        $employeeDetails->yearsoftenure1 = $request->input('yearsoftenure1');

        }

        if($request->has('companyname2')){

        $employeeDetails->companyname2 = $request->input('companyname2');

        }

        if($request->has('position2')){

        $employeeDetails->position2 = $request->input('position2');

        }

        if($request->has('companyaddress2')){

        $employeeDetails->companyaddress2 = $request->input('companyaddress2');

        }

        if($request->has('yearsoftenure2')){

        $employeeDetails->yearsoftenure2 = $request->input('yearsoftenure2');

        }

        if($request->has('companyname3')){

        $employeeDetails->companyname3 = $request->input('companyname3');

        }

        if($request->has('position3')){

        $employeeDetails->position3 = $request->input('position3');

        }

        if($request->has('companyaddress3')){

        $employeeDetails->companyaddress3 = $request->input('companyaddress3');

        }

        if($request->has('yearsoftenure3')){

        $employeeDetails->yearsoftenure3 = $request->input('yearsoftenure3');

        }

        if($request->has('companyname4')){

        $employeeDetails->companyname4 = $request->input('companyname4');

        }

        if($request->has('position4')){

        $employeeDetails->position4 = $request->input('position4');

        }

        if($request->has('companyaddress4')){

        $employeeDetails->companyaddress4 = $request->input('companyaddress4');

        }

        if($request->has('yearsoftenure4')){

        $employeeDetails->yearsoftenure4 = $request->input('yearsoftenure4');

        }

        if($request->has('employeeotherdata')){

        $employeeDetails->employeeotherdata = $request->input('employeeotherdata');

        }

        $employeeDetails->save();

        return redirect()->route('employee.details', ['id' => $id])->with('updatesuccess', 'Employee details updated successfully.');
        

    }

/*
    public function edit($id){

        $employee = Employee201Form::find($id);
        return view('edit', compact('employee'));
        
    }
*/


/*
    public function update(Request $request, $id){

        $employee = Employee201Form::find($id);
        $employee->employeenamename = $request->input('employeenamename');
        $employee->employeeaddress = $request->input('employeeaddress');
        $employee->employeeposition = $request->input('employeeposition');
        $employee->employeecontact = $request->input('employeecontact');
        $employee->employeeemail = $request->input('employeeemail');
        $employee->employeeage = $request->input('employeeage');
        $employee->gender = $request->input('gender');

        $employee->employeebirthdate = $request->input('employeebirthdate');
        $employee->employeebirthplace = $request->input('employeebirthplace');
        $employee->employeereligion = $request->input('employeereligion');
        $employee->employeecivilstatus = $request->input('employeecivilstatus');
        $employee->employeelicense = $request->input('employeelicense');
        $employee->dateofexpiration = $request->input('dateofexpiration');
        $employee->employeefathername = $request->input('employeefathername');

        $employee->employeemothername = $request->input('employeemothername');
        $employee->employeespousename = $request->input('employeespousename');
        $employee->employeerelativename = $request->input('employeerelativename');
        $employee->employeerelativenumber = $request->input('employeerelativenumber');
        $employee->employeesss = $request->input('employeesss');
        $employee->employeephilhealth = $request->input('employeephilhealth');
        $employee->employeetin = $request->input('employeetin');
        $employee->employeepagibig = $request->input('employeepagibig');
        $employee->hsnameofschool = $request->input('hsnameofschool');
        $employee->hscoursedegree = $request->input('hscoursedegree');
        $employee->hsyearcompleted = $request->input('hsyearcompleted');
        $employee->collegenameofschool = $request->input('collegenameofschool');
        $employee->collegecoursedegree = $request->input('collegecoursedegree');
        $employee->collegeyearcompleted = $request->input('collegeyearcompleted');
        $employee->vocationalnameofschool = $request->input('vocationalnameofschool');
        $employee->vocationalcoursedegree = $request->input('vocationalcoursedegree');
        $employee->vocationalyearcompleted = $request->input('vocationalyearcompleted');
        $employee->companyname1 = $request->input('companyname1');
        $employee->position1 = $request->input('position1');
        $employee->companyaddress1 = $request->input('companyaddress1');
        $employee->yearsoftenure1 = $request->input('yearsoftenure1');
        $employee->companyname2 = $request->input('companyname2');
        $employee->position2 = $request->input('position2');
        $employee->companyaddress2 = $request->input('companyaddress2');
        $employee->yearsoftenure2 = $request->input('yearsoftenure2');
        $employee->companyname3 = $request->input('companyname3');
        $employee->position3 = $request->input('position3');
        $employee->companyaddress3 = $request->input('companyaddress3');
        $employee->yearsoftenure3 = $request->input('yearsoftenure3');
        $employee->companyname4 = $request->input('companyname4');
        $employee->position4 = $request->input('position4');
        $employee->companyaddress4 = $request->input('companyaddress4');
        $employee->yearsoftenure4 = $request->input('yearsoftenure4');
        $employee->employeeotherdata = $request->input('employeeotherdata');
        $employee->update();
        return redirect()->back()->with('status', 'Employee Details Updated Successfully');



    }
 */
}


