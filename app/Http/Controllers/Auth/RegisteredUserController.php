<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed'],
            // 'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => "resto",
            'is_type' => "0",
        ]);

        return redirect(route('login'));

        // event(new Registered($user));

        // Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);
    }

    public function newPswd(Request $request){
        // dd($request->all());
        if($request->new_password != $request->c_password){
            return redirect()->back()->with('error','les deux mots de pass doivent etre egaaux !!');
        }
        $user = User::find($request->user_id);

        $user->update([
            // 'name' => $request->gerant_fname." ".$request->gerant_lname,
            // 'email' => $request->gerant_email,
             'password' => Hash::make($request->new_password),
            // 'password' => $request->password,
            // 'type' => "gerant",
            // 'tel' => $request->tel,
            // 'location' => $request->location,
            // 'photo' => $img,
             'is_first' => "0",
             'status' => "1",
            // 'created_by' => Auth()->user()->id,
        ]);
        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);

        // dd($request->all());
    }
}
