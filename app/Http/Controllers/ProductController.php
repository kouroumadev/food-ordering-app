<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct() {
        // $sms = "Votre compte n'a pas ete active, veuillez contacter les administrateurs";
        // $this->middleware('auth');
        // $this->middleware(function ($request, $next) {
        // if(Auth::user()->status == '0'){
        //     return view('auth.login');
        // }

        // });
    }

    /**
     * Display a listing of the resource.
     *
     *  @return \Illuminate\View\View
     */
    public function index()
    {
        if(Auth()->user()->type == 'resto'){
            $prods = Auth()->user()->prods;
            $cats = Auth()->user()->cats;
        } else if(Auth()->user()->type == 'gerant'){
            $prods = User::find(Auth()->user()->created_by)->prods;
            $cats =  User::find(Auth()->user()->created_by)->cats;
        }

        return view('product.index', compact('cats','prods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     *  @return \Illuminate\View\View
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     *  @return \Illuminate\View\View
     */
    public function store(StoreProductRequest $request)
    {
        // dd($request->all());
        $file = $request->file('prod_img')->getClientOriginalName();
        $filename = pathinfo($file, PATHINFO_FILENAME);
        $extension = pathinfo($file, PATHINFO_EXTENSION);

        $img = $filename."-".time()."-".Auth()->user()->id.".".$extension;

        Storage::disk('prodImg')->put($img,file_get_contents($request->file('prod_img')));

        if(Auth()->user()->type == 'resto'){
            $user_id = Auth()->user()->id;
        } else if(Auth()->user()->type == 'gerant'){
            $user_id = Auth()->user()->created_by;
        }

        $prod = new Product();

        $prod->user_id = $user_id;
        $prod->category_id = $request->category_id;
        $prod->prod_name = $request->prod_name;
        $prod->prod_desc = $request->prod_desc;
        $prod->prod_img = $img;

        $prod->save();
        return redirect(route('product.index'))->with('success', 'Produit ajouter avec succes');




    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     *  @return \Illuminate\View\View
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     *  @return \Illuminate\View\View
     */
    public function edit(Product $product)
    {
        // dd($product->prod_name);
        $cats = Auth()->user()->cats;
        return view('product.edit', compact('product','cats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     *  @return \Illuminate\View\View
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        if($request->has('status')){
            $status = '1';
        } else {
            $status = '0';
        }

        if($request->hasFile('prod_img'))
        {
            $file = $request->file('prod_img')->getClientOriginalName();
            $filename = pathinfo($file, PATHINFO_FILENAME);
            $extension = pathinfo($file, PATHINFO_EXTENSION);

            $img = $filename."-".time()."-".Auth()->user()->id.".".$extension;

            Storage::disk('prodImg')->put($img,file_get_contents($request->file('prod_img')));

            if(Storage::disk('prodImg')->exists($request->image)){
                Storage::disk('prodImg')->delete($request->image);
            }

        } else {
            $img = $request->image;
        }

        $product->update([
            'user_id' => Auth()->user()->id,
            'category_id' => $request->category_id,
            'prod_name' => $request->prod_name,
            'prod_desc' => $request->prod_desc,
            'prod_img' => $img,
            'status' => $status,
        ]);

        return redirect(route('product.index'))->with('success','Produit supprimer avec succes');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     *  @return \Illuminate\View\View
     */
    public function destroy(Product $product)
    {
        if(Storage::disk('prodImg')->exists($product->prod_img)){
            Storage::disk('prodImg')->delete($product->prod_img);
        }
        $product->delete();
        return redirect(route('product.create'))->with('success','Produit supprimer avec succes');

    }

    public function editStatus(String $id){
        $prod = Product::find($id);
        $prod->update([
            'status' => !$prod->status
        ]);
        return redirect(route('product.index'))->with('success', 'Status modifié avec succes');
    }
}
