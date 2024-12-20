<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Student;


class HomeController extends Controller
{


    public function index()
{
    return view('home');
}

    public function upload(Request $request)
{
    die("test");
    // Step 1: Validate the incoming data (name, email, and file)
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'file' => 'required|file|mimes:jpg,jpeg,png,gif|max:10240' // Added file validation.
    ]);

    // Step 2: Create a new student record
    $student = new Student;
    
    // Step 3: Assign name and email from the request
    $student->name = $request->name;
    $student->email = $request->email;

    // Step 4: Handle file upload (make sure the file is uploaded and valid)
    if ($request->hasFile('file') && $request->file('file')->isValid()) {
        // Retrieve the uploaded file
        $image = $request->file('file');  // Fixed: You should use $request->file('file') to access the file.

        // Generate a unique name for the image using current timestamp and original extension
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        
        // Move the file to the 'student' directory in the public folder
        $image->move(public_path('student'), $imagename);  // Fixed: Use $image->move() instead of $request->file->move()

        // Step 5: Save the image file name in the student record
        $student->image = $imagename;
    }

    // Step 6: Save the student data in the database
    $student->save();

    // Step 7: Redirect back to the previous page with a success message
    return redirect()->back()->with('success', 'Student uploaded successfully!');
}




}

