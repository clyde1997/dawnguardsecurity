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


        //Gets the logged in user's id
        $employeeAccountId = Auth::id();

        $incomingField = $request->validate([

            'filename' => ['required'],
            'documents' => 'required|mimes:jpeg,pdf|max:2048',

        ]);

        //Adds the logged in user's ID to the validated data
        $incomingField['employeeaccount_id'] = $employeeAccountId;

        //Creates and Send Data to database with $incomingField that equals to $employeeAccountId
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
    public function viewEmployeeDocuments($id, Request $request)
    {

        //For Search Documents Functionality
        $employeeDocsQuery = EmployeeDocuments::query();

        if($request->filled('documentSearch')){

            $employeeDocsQuery->where('filename', 'like', '%' . $request->documentSearch . '%');

        }

        /*
        Passing employeeDocuments to employeeDocsQuery to Fetch the employeeaccount_id Foreign Key from EmployeeDocuments Model
        and also to make the search function work
        */
        $employeeDocuments = $employeeDocsQuery->where('employeeaccount_id', $id)->get();


        //Below code is to fetch and display the Employee's Fullname by ID from EmployeeAccounts Model
        $employeeFullName = EmployeeAccounts::findOrFail($id);


        return view('employeedocs', compact('employeeDocuments', 'employeeFullName'));

    }



   
    //Function so Admin can download the uploaded documents from Employee
    public function downloadDocument($id)
    {
        $document = EmployeeDocuments::find($id);
        $filePath = public_path('employeedocuments/' . $document->documents);
        
        return response()->download($filePath);
    }

}
