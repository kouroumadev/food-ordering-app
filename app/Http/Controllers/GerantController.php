<?php

namespace App\Http\Controllers;

// use App\Http\Requests\StoreGerantRequest;
// use App\Http\Requests\UpdateGerantRequest;
use Illuminate\Http\Request;
use App\Models\Gerant;
use App\Models\Resto;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;


class GerantController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $gerants = User::where('type','gerant')
                    ->where('created_by', Auth()->user()->id)->get();
        $restos = Auth()->user()->restos;
        return view('gerant.index', compact('gerants','restos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $restos = Auth()->user()->restos;
        return view('gerant.create', compact('restos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\View\View
     */
    public function store(Request $request)
    {
        // dd($request->all());
        if($request->has('status'))
            $status = '1';
        else
            $status = '0';

        if($request->password != $request->confirm_password){
            return redirect(route('gerant.index'))->with('error', 'les deux mots de pass doivent etre egaaux !!');
        }
        if($request->hasFile('photo')){
            $file = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($file, PATHINFO_FILENAME);
            $extension = pathinfo($file, PATHINFO_EXTENSION);

            $img = $filename."-".time()."-".Auth()->user()->id.".".$extension;

            Storage::disk('gerantImg')->put($img,file_get_contents($request->file('photo')));
        } else {
            $img = "";
        }

         User::create([
            'resto_id' => $request->resto_id,
            'name' => $request->gerant_fname." ".$request->gerant_lname,
            'email' => $request->gerant_email,
            'password' => Hash::make($request->password),
            'pass' => $request->password,
            'type' => "gerant",
            'tel' => $request->tel,
            'location' => $request->location,
            'photo' => $img,
            'is_first' => "1",
            'created_by' => Auth()->user()->id,
            'status' => $status,
        ]);

        return redirect(route('gerant.index'))->with('success', 'Gerant ajouter avec succes');

    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\View\View
     */
    public function show(String $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\View\View
     */
    public function edit(String $id)
    {
        $gerant = User::find($id);
        $resto = $gerant->resto;
        return view('gerant.edit', compact('gerant','resto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\View\View
     */
    public function update(Request $request, String $id)
    {
        // dd($request->all());
        if($request->has('status'))
            $status = '1';
        else
            $status = '0';

        if($request->hasFile('photo')){
            $file = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($file, PATHINFO_FILENAME);
            $extension = pathinfo($file, PATHINFO_EXTENSION);

            $img = $filename."-".time()."-".Auth()->user()->id.".".$extension;

            if(Storage::disk('gerantImg')->exists($request->image)){
                Storage::disk('gerantImg')->delete($request->image);
            }

            Storage::disk('gerantImg')->put($img,file_get_contents($request->file('photo')));
        } else {
            $img = "";
        }
        $user = User::find($id);

        $user->update([
            'name' => $request->gerant_fname." ".$request->gerant_lname,
            'email' => $request->gerant_email,
            // 'password' => Hash::make($request->password),
            // 'password' => $request->password,
            // 'type' => "gerant",
            'tel' => $request->tel,
            'location' => $request->location,
            'photo' => $img,
            'status' => $status,
            // 'is_first' => "1",
            // 'created_by' => Auth()->user()->id,
        ]);

        return redirect(route('gerant.index'))->with('success', 'Gerant Modifier avec succes');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\View\View
     */
    public function destroy(String $id)
    {
        //
    }
}
