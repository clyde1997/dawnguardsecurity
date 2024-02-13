<?php

namespace App\Http\Controllers;

use App\Models\EmployeeAccounts;
use Illuminate\Http\Request;
use App\Models\EmployeeDocuments;
use Illuminate\Support\Facades\Auth;

class EmployeeDocumentsController extends Controller
{
    
    //Function to send Documents field to database 
    public function addDocument(Request $request){

        
        $employeeAccountId = Auth::id();//Gets the logged in user's id

        $incomingField = $request->validate([

            'documents' => 'required|mimes:jpeg,pdf|max:2048',

        ]);

      
        $incomingField['employeeaccount_id'] = $employeeAccountId;//Adds the logged in user's ID to the validated data

        $employeeDocuments = EmployeeDocuments::create($incomingField);


        //Below if conditional to handle the file upload
        if ($request->hasFile('documents')) {

            $documentsUploadFile = $request->file('documents');

            $documentsFileName = 'documents_' . time() . '.' . $documentsUploadFile->getClientOriginalExtension();
    
            $documentsUploadFile->move(public_path('employeedocuments'), $documentsFileName);//Move The Uploaded File to public/employeedocuments/ directory

            $employeeDocuments->update(['documents' => $documentsFileName]);//Sending data file to database

        }
        
        return redirect('userdash')->with('status', 'Your Document Has Been Sent To Admin');

    }


    //Function to view Employee Documents Per Employee ID
    public function viewEmployeeDocuments($id)
    {

        //Fetching the employeeaccount_id Foreign Key from EmployeeDocuments
        $employeeDocuments = EmployeeDocuments::where('employeeaccount_id', $id)->get();

        return view('employeedocs', compact('employeeDocuments'));

    }



   
    //Function so Admin can download the uploaded documents from Employee
    public function downloadDocument($id)
    {
        $document = EmployeeDocuments::find($id);
        $filePath = public_path('employeedocuments/' . $document->documents);
        
        return response()->download($filePath);
    }

}
