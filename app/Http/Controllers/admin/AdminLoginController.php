<?php

namespace App\Http\Controllers\Admin; 
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AdminLoginController extends Controller
{
    public function showLoginForm()
    {

        return view('admin.login'); 
    }
//     public function authenticate(Request $request)
// {
//     $validator = Validator::make($request->all(), [
//         'email' => 'required|email',
//         'password' => 'required'
//     ]);

//     if ($validator->passes()) {
//         if (Auth::guard('admin')->attempt(
//             ['email' => $request->email, 'password' => $request->password],
//             $request->get('remember')
//         )) {
//             $admin=Auth::guard('admin')->user();
//             if($admin->role ==2){
//                 return redirect()->route('admin.dashboard');

//             }else{
//                 return redirect()->route('admin.login')->with('error', 'You are not authorized to access admin panel');

//             }
            
//         } else {
//             $admin=Auth::guard('admin')->logout();
//             return redirect()->route('admin.login')->with('error', 'Either Email/Password is incorrect');
//         }
//     }

//     return redirect()->back()->withErrors($validator)->withInput();
// }
public function authenticate(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    if (Auth::guard('admin')->attempt(
        ['email' => $request->email, 'password' => $request->password],
        $request->boolean('remember')
    )) {

      
        $request->session()->regenerate();

        $admin = Auth::guard('admin')->user();

        
        if ($admin->role != 2) {

            Auth::guard('admin')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()
                ->route('admin.login')
                ->with('error', 'You are not authorized to access admin panel');
        }

       
        return redirect()->route('admin.dashboard');
    }

    return redirect()
        ->route('admin.login')
        ->with('error', 'Either Email or Password is incorrect');
}


}
