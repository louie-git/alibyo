<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view('pages.signin');
    }

    public function resident(){
        return view('pages.resident');
    }
    public function donation(){
        return view('pages.donation');
    }
    public function relief(){
        return view('pages.relief');
    }
    public function signin(){
        return view('pages.signin');
    }
    public function reg(){
        return view('pages.reg');
    }
    public function adminview(){
        return view('pages.adminview');
    }
    public function smsSender(){
        return view('pages.smsSender');
    }
    public function dashboard(){
        return view('pages.dash');
    }
    public function editaccount(){
        return view('pages.brgyeditacc');
    }
    public function updateaccount(){
        return view('pages.updateaccount');
    }
    public function admin_reg(){
        return view('pages.admin_register');
    }
    public function reset_password(){
        return view('pages.reset_password');
    }
    
}

