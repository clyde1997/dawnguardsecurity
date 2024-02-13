<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeePayslip;


class EmployeePayslipController extends Controller
{
    
    //Function to to send payslip file to database and to local app storage
    public function uploadEmployeePayslip(Request $request){

        $incomingField = $request->validate([

            'employeeaccount_id' => ['required'],
            'payslip' => 'required|mimes:jpeg,pdf|max:2048',

        ]);


        $employeePayslip = EmployeePayslip::create($incomingField);

        if ($request->hasFile('payslip')) {

            $payslipUploadFile = $request->file('payslip');

            $payslipFileName = 'payslip_' . time() . '.' . $payslipUploadFile->getClientOriginalExtension();
    
            $payslipUploadFile->move(public_path('payslips'), $payslipFileName);//Move The Uploaded File to public/payslips/ directory

            $employeePayslip->update(['payslip' => $payslipFileName]);//Sending data file to database

        }
        
        return redirect('admindash')->with('status', 'Employee Payslip Has Been Submitted');

    }

    //Function so employee can download his payslip uploaded by admin
    public function downloadPayslip($id)
    {
        $payslip = EmployeePayslip::find($id);
        $filePath = public_path('payslips/' . $payslip->payslip);
        
        return response()->download($filePath);
    }




}
