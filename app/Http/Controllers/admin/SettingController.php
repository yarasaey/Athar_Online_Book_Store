<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
//use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function showChangePasswordForm()
    {
        return view('admin.change-password');
    }
    public function changePassword(Request $request)
    {

        $validator= Validator::make($request->all(),[ 'old_password'=>'required',
            'new_password'=>'required|min:4|max:12',
            'confirm_password'=>'required|same:new-password',])
           
        

       ;
        $admin = User::where('id', Auth::guard('admin')->id())->first();
        if ($validator->passes()) {
            if (!Hash::check($request->old_password, $admin->password)) {
                return back()->with('errors', 'Your old password is not correct,please try again');
            }
           User::where('id', Auth::guard('admin')->id())->update([
           'password'=>Hash::make($request->new_password)
           ]);
            return back()->with('success', 'Your  password updated succesfully ');
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }
    }
}
