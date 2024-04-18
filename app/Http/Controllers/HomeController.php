<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index() {
        // dd(Auth::user()->status);

        if(Auth::user()->is_first == "1"){
            $user = Auth::user();
            return view('auth.first-login', compact('user'));
        } else {
            return view("welcome");
        }

        // $sms = "Votre compte n'a pas ete active, veuillez contacter les administrateurs";

        // if(!Auth::user()) {
        //     return view("auth.login");
        // } else {
        //     // dd(Auth::user());
        //     if(Auth::user()->type == "resto"){
        //         if(Auth::user()->status == "0"){
        //             Auth::guard('web')->logout();
        //            return view('auth.login', compact('sms'));
        //         } else {
        //             return view("welcome");
        //         }

        //     } else if(Auth::user()->type == "admin"){
        //         return view("welcome");
        //     } else {
        //         if(Auth::user()->is_first == "1"){
        //             $user = Auth::user();
        //             return view('auth.first-login', compact('user'));
        //         } else {
        //             if(Auth::user()->status == "0"){
        //                 Auth::guard('web')->logout();
        //                 return view('auth.login', compact('sms'));
        //             } else {
        //                 return view("welcome");
        //             }
        //         }
        //     }
        //     // return view("welcome");
        // }

        // dd("HELLOO");
    }
}
