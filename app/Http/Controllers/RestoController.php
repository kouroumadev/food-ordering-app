<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRestoRequest;
use App\Http\Requests\UpdateRestoRequest;
use Illuminate\Http\Request;
use App\Models\Resto;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class RestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $restos = Auth()->user()->restos;
        // $gerants = Auth()->user()->gerants;
        $flag = "0";
        // dd($restos);
        return view("resto.index", compact('restos','flag'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRestoRequest  $request
     * @return \Illuminate\View\View
     */
    public function store(StoreRestoRequest $request)
    {

        $file = $request->file('resto_logo')->getClientOriginalName();
        $filename = pathinfo($file, PATHINFO_FILENAME);
        $extension = pathinfo($file, PATHINFO_EXTENSION);

        $logo = $filename."-".time()."-".Auth()->user()->id.".".$extension;


        Storage::disk('logos')->put($logo,file_get_contents($request->file('resto_logo')));

        $resto = new Resto();

        $resto->user_id = Auth()->user()->id;
        $resto->resto_name = $request->resto_name;
        $resto->resto_com = $request->resto_com;
        $resto->resto_location = $request->resto_location;
        $resto->resto_logo = $logo;

        $resto->save();
        return redirect(route('resto.index'))->with('success', 'restaurant ajouter avec succes');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resto  $resto
     * @return \Illuminate\View\View
     */
    public function show(Resto $resto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resto  $resto
     * @return \Illuminate\View\View
     */
    public function edit(Resto $resto)
    {
        // $flag = "1";
        // dd($resto);

        // dd($gerant);


        return view("resto.edit", compact('resto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRestoRequest  $request
     * @param  \App\Models\Resto  $resto
     * @return \Illuminate\View\View
     */
    public function update(UpdateRestoRequest $request, Resto $resto)
    {
        if($request->has('status')){
            $status = '1';
        } else {
            $status = '0';
        }

        if($request->hasFile('resto_logo'))
        {
            if(Storage::disk('logos')->exists($resto->resto_logo)){
                Storage::disk('logos')->delete($resto->resto_logo);
            }

            $file = $request->file('resto_logo')->getClientOriginalName();
            $filename = pathinfo($file, PATHINFO_FILENAME);
            $extension = pathinfo($file, PATHINFO_EXTENSION);

            $logo = $filename."-".time()."-".Auth()->user()->id.".".$extension;

            Storage::disk('logos')->put($logo,file_get_contents($request->file('resto_logo')));

        } else {
            $logo = $request->logo;
        }

        $resto->update([
            'resto_name' => $request->resto_name,
            'resto_com' => $request->resto_com,
            'resto_location' => $request->resto_location,
            'resto_logo' => $logo,
            'status' => $status,
        ]);

        return redirect(route('resto.index'))->with('success', 'Restaurant modifier avec succes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resto  $resto
     * @return \Illuminate\View\View
     */
    public function destroy(Resto $resto)
    {
        // dd($resto);
        if(Storage::disk('logos')->exists($resto->resto_logo)){
            Storage::disk('logos')->delete($resto->resto_logo);
        }
        $resto->delete();

        return redirect(route('resto.index'))->with('success','Restaurant supprimer avec succes');

    }
}
