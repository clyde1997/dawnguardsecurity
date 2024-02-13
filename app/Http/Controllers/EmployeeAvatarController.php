<?php

namespace App\Http\Controllers;

use App\Models\EmployeeAvatar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EmployeeAvatarController extends Controller
{
    
    //Function to upload avatar
    public function employeeavatar(Request $request)
    {
        $request->validate([

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('avatars'), $imageName);

            if (auth()->check()) {
                $employeeId = auth()->user()->id;

                // Use updateOrCreate To Send to my database
                EmployeeAvatar::updateOrCreate(
                    ['employeeaccount_id' => $employeeId],
                    ['image' => $imageName]
                );

                return redirect('/userdash')->with('success', 'Avatar uploaded successfully.');

            } else {

                return redirect('/userdash')->with('error', 'User not authenticated.');

            }

        } else {

            return redirect('/userdash')->with('error', 'Something went wrong.');
        }
    }


    //Function to delete uploaded avatar
    public function deleteAvatar()
    {
        if (auth()->check()) {

            $employeeId = auth()->user()->id;
            
            // Retrieve the employee's avatar record
            $avatar = EmployeeAvatar::where('employeeaccount_id', $employeeId)->first();

            if ($avatar) {

                // Deleting image file from directory
                $imagePath = public_path('avatars') . '/' . $avatar->image;

                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }

                // Deleting avatar from database
                $avatar->delete();

                return redirect('/userdash')->with('successdeleteavatar', 'Avatar deleted successfully.');

            } else {

                return redirect('/userdash')->with('errordeleteavatar', 'Avatar not found.');
            }

        } else {

            return redirect('/userdash')->with('errordeleteavatar', 'User not authenticated.');

        }

    }

}
