<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\DiscountCode;


class DiscountCodeController extends Controller
{
    public function index(){
        $discountcode=DiscountCode::latest('id')->paginate(10);


        return view('admin.copouns.index',compact('discount_copouns'));
    }
     public function create(){
        return view('admin.copouns.create');
        
    }
     public function store(Request $request){
        $validator=Validator::make($request->all(),[  
        'code' => 'required|string|max:255|unique:discount_copouns,code',
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'maxs_uses' => 'required|integer|min:1',
        'maxs_uses_users' => 'required|integer|min:1',
        'type' => 'required|in:percent,fixed',
        'min_amount' => 'required|numeric|min:0',
        'status' => 'required|in:0,1',
        'starts_at' => 'required|date',
        'expires_at' => 'required|date|after_or_equal:starts_at',

        ]);
        if($validator->fails()){
            return redirect()->back()
                              ->withErrors($validator)
                              ->withInput();


        }
        $discountcode=new DiscountCode();
         
         $discountcode->code=$request->code;
         $discountcode->name=$request->name;
         $discountcode->description=$request->description;
         $discountcode->maxs_uses=$request->maxs_uses;
         $discountcode->maxs_uses_users=$request->maxs_uses_users;
         $discountcode->type=$request->type;
         $discountcode->min_amount=$request->min_amount;
         $discountcode->status=$request->status;
         $discountcode->starts_at=$request->starts_at;
         $discountcode->expires_at=$request->expires_at;
          $discountcode->save();
          
  $request->session()->flash('success', 'DiscountCode added successfully.');
  return redirect()->route('copoun.create');

        

        

        
    }
     public function edit(){
        
    }
     public function update(){
        
    }
     public function destory(){
        
    }
}
