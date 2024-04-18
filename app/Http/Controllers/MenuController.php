<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Product;
use App\Models\Resto;
use Illuminate\Http\Request;
use Auth;
use DB;

class MenuController extends Controller
{
    public function index(){
        return view('menu.index');
    }
    public function menu1(){
        return view('menu.menu1');
    }

    public function menu2(){
        return view('menu.menu2');
    }
    public function menu3(){
        return view('menu.menu3');
    }
    public function menu4(){
        return view('menu.menu4');
    }
    public function menu2Final(){
        // $m = Auth::user()->menus;

        $m1 =Auth::user()->menus()
            ->where('num','2')
            ->where('type','Entrée')->get();

        $m2 =Auth::user()->menus()
            ->where('num','2')
            ->where('type','Petit Déjeuner')->get();

        $m3 =Auth::user()->menus()
            ->where('num','2')
            ->where('type','Déjeuner')->get();

        $m4 =Auth::user()->menus()
            ->where('num','2')
            ->where('type','Dinner')->get();

        return view('menu.menu2final', compact('m1','m2','m3','m4'));
    }

    public function menu1Final(){
        // $m = Auth::user()->menus;

        $m1 =Auth::user()->menus()
            ->where('num','1')
            ->where('type','Entrée')->get();

        $m2 = Auth::user()->menus()
            ->where('num','1')
            ->where('type','Petit Déjeuner')->get();

        $m3 = Auth::user()->menus()
            ->where('num','1')
            ->where('type','Déjeuner')->get();

        $m4 = Auth::user()->menus()
            ->where('num','1')
            ->where('type','Dinner')->get();

        return view('menu.menu1final', compact('m1','m2','m3','m4'));
    }

    public function menu3Final(){

        $m1 = Auth::user()->menus()
            ->where('num','3')
            ->where('type','Petit Déjeuner')->get();

        $m2 = Auth::user()->menus()
            ->where('num','3')
            ->where('type','Déjeuner')->get();

        $m3 = Auth::user()->menus()
            ->where('num','3')
            ->where('type','Dinner')->get();

        return view('menu.menu3final', compact('m1','m2','m3'));
    }
    public function menu4Final(){

        $data =  Auth::user()->menus()->where('num','4')->get();
        // $m1 = $data->where('type','Déjeuner');
        // $ii = $data->where('type','Vin');

         $m1 = $data->where('type','Petit Déjeuner');
         $m2 = $data->where('type','Déjeuner');
         $m3 = $data->where('type','Dinner');
         $m4 = $data->where('type','Dessert');
         $m5 = $data->where('type','Vin');
         $m6 = $data->where('type','tea');
        // dd($m1);

        return view('menu.menu4final', compact('m1','m2','m3','m4','m5','m6'));
    }

    public function editMenu1(){
        $products = Product::all();
        $restos = Resto::all();
        $menus = Auth::user()->menus()
             ->where('num','1')->get();
        return view('menu.edit-menu1', compact('products','restos','menus'));
    }

    public function editMenu2(){
        $products = Product::all();
        $restos = Resto::all();
        $menus = Auth::user()->menus()
            ->where('num','2')->get();
        // $menus = Menu::all();
        return view('menu.edit-menu2', compact('products','restos','menus'));
    }
    public function editMenu3(){
        $products = Product::all();
        $restos = Resto::all();
        $menus = Auth::user()->menus()
             ->where('num','3')->get();

        return view('menu.edit-menu3', compact('products','restos','menus'));
    }
    public function editMenu4(){
        $products = Product::all();
        $restos = Resto::all();
        $menus = Auth::user()->menus()
             ->where('num','4')->get();

        return view('menu.edit-menu4', compact('products','restos','menus'));
    }
    public function menu1View(){
        $menus = Product::all();
        $restos = Resto::all();
        return view('menu.edit-menu1', compact('products','restos'));
    }

    public function getTemplate(Request $request){
        dd($request->all());
    }

    public function getProd(Request $request){

        $prod = Product::find($request->prod_id);

        return response()->json($prod, 200);


        // dd($request->all());
    }
    public function getRestoInfo(Request $request){

        $resto = Resto::find($request->resto_id);

        return response()->json($resto, 200);


        // dd($request->all());
    }

    public function menu2Store(Request $request){
        // dd($request->all());
        $menu = new Menu();

        $menu->user_id = Auth::user()->id;
        $menu->num = '2';
        $menu->resto_id = $request['resto_id'];
        $menu->prod_id = $request['prod_id'];
        $menu->price = $request['price'];
        $menu->type = $request['type_id'];
        $menu->save();

        return redirect(route('menu.edit.menu2'))->with('success','Produit ajouté avec sucess');
    }

    public function menu3Store(Request $request){
        // dd($request->all());
        $menu = new Menu();

        $menu->user_id = Auth::user()->id;
        $menu->num = '3';
        $menu->resto_id = $request['resto_id'];
        $menu->prod_id = $request['prod_id'];
        $menu->price = $request['price'];
        $menu->type = $request['type_id'];
        $menu->save();

        return redirect(route('menu.edit.menu3'))->with('success','Produit ajouté avec sucess');
    }
    public function menu4Store(Request $request){
        // dd($request->all());
        $menu = new Menu();

        $menu->user_id = Auth::user()->id;
        $menu->num = '4';
        $menu->resto_id = $request['resto_id'];
        $menu->prod_id = $request['prod_id'];
        $menu->price = $request['price'];
        $menu->type = $request['type_id'];
        $menu->save();

        return redirect(route('menu.edit.menu4'))->with('success','Produit ajouté avec sucess');
    }

    public function menu1Store(Request $request){
        $menu = new Menu();

        $menu->user_id = Auth::user()->id;
        $menu->num = '1';
        $menu->resto_id = $request['resto_id'];
        $menu->prod_id = $request['prod_id'];
        $menu->price = $request['price'];
        $menu->type = $request['type_id'];
        $menu->save();

        return redirect(route('menu.edit.menu1'))->with('success','Produit ajouter avec sucess');
    }

}
