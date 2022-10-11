<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table("categories")->get();
//       return view("dash.categories.index", compact($categories));
       return view("dash.categories.index", [
           "categories" => $categories
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dash.categories.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = DB::table("categories")->insert([
            "name" => $request['name'],
            "notes" => $request['notes'],
            "created_at" => now(),
        ]);
        if($store) {
            return redirect()
                ->route("categories.index")
                ->with("success", "Category created");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view("dash.categories.show", ["category" => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view("dash.categories.edit", ["category" => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $update = $category->update([
            "name" => $request['name'],
            "notes" => $request['notes'],
            "updated_at" => now()
        ]);
        if($update) {
            return redirect()
                ->route("categories.index")
                ->with("success", "Category updated");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $destroy =  $category->delete();
        if($destroy) {
            return redirect()
                ->route("categories.index")
                ->with("success", "Category deleted");
        }
    }
}
