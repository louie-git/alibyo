<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Distributor;
use Hash;
class DistributorsController extends Controller
{
    public function index(){
        $dist = Distributor::all();
        return view('pages.distributor')->with('distributors',$dist);
    }

    public function register(Request $request){

        $request->validate([
            'username' => 'required|unique:distributors|max:255',
        ]);
        $dist = new Distributor;
        $dist->last_name = $request->input('lname');
        $dist->first_name = $request->input('fname');
        $dist->middle_name = $request->input('mname');
        $dist->contact_number = $request->input('contact');
        $dist->date_of_birth = $request->input('dob');
        $dist->status = $request->input('status');
        $dist->gender = $request->input('gender');
        $dist->username = $request->input('username');
        $dist->password = Hash::make($request->input('password'));
        $dist->save();
        return back()->with('success','Account Successfully Added');
    }
}