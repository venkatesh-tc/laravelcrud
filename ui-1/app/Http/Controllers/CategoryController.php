<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categories;
    public function __construct() 
{
    $this->categories = Category::paginate(10);
   
}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $categories = Category::paginate(10);
        return view('category.index', [
            'categories' => $this->categories
        ]);
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
    public function show(string $id)
    {
        $category = Category::findOrFail($id);
        return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)

    {
        $category = Category::findOrFail($id);  
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
   
    // Validate the incoming data
    {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string|max:255',
        'status' => 'nullable|boolean',
    ]);

    // Find the category by ID
    $category = Category::find($id);

    // Check if the record exists
    if (!$category) {
        return redirect()->back()->with('error', 'Category not found!');
    }

    // Update the record
    $category->update([
        'name' => $validated['name'],
        'description' => $validated['description'],
        'status' => $validated['status'] ?? 0, // Default to 0 if not provided
    ]);

    // Redirect back with success message
    return redirect('/category')->with('status', 'Category updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        if ($category) {
            $category->delete();
            return redirect('/category')->with('status', 'Category deleted successfully!');
        }
        return redirect('/category')->with('error', 'Category not found.');
    
    }
}

