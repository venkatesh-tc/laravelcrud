<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() 
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'status' => 'nullable',
        ]);

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status == true ? 1:0,
        ]);

        return redirect('/category')->with('status','Category Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'status' => 'nullable',
        ]);

        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status == true ? 1:0,
        ]);

        return redirect('/category')->with('status','Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
       alert()->success('SuccessAlert','Lorem ipsum dolor sit amet.');
       // Alert::success('Deleted Successfully!','Welcome to your dashboard');
        return redirect('/category')->with('status','Category Deleted Successfully');
       
    }

    public function testAlert()
{
    Alert::success('Success', 'SweetAlert is working!');
    return redirect()->route('home');
}
   



}