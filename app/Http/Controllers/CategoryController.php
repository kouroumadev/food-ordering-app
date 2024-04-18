<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $cats = Auth()->user()->cats;
        return view('category.index', compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\View\View
     */
    public function store(StoreCategoryRequest $request)
    {
        $cat = new Category();

        $cat->user_id = Auth()->user()->id;
        $cat->cat_name = $request->cat_name;

        $cat->save();
        return redirect(route('category.index'))->with('success', 'Categorie ajouter avec succes');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\View\View
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\View\View
     */
    public function edit(Category $category)
    {
        // dd($category->id);
        $cats = Auth()->user()->cats;
        return view('category.index', compact('cats', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\View\View
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        // dd($category);
        $category->update([
            'user_id' => Auth()->user()->id,
            'cat_name' => $request->cat_name,
        ]);
        return redirect(route('category.index'))->with('success', 'categorie modifier avec succes');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\View\View
     */
    public function destroy(Category $category)
    {
        // $cat = Category::find($category->id);
        // dd($category->id);
        $category->delete();
        return redirect(route('category.index'))->with('success', 'categorie supprimer avec succes');

    }

    public function editStatus(String $id){
        $cat = Category::find($id);
        $cat->update([
            'status' => !$cat->status
        ]);
        return redirect(route('category.index'))->with('success', 'Status modifié avec succes');
    }
}
