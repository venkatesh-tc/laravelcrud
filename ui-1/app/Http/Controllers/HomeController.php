<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Log; // Use for logging

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function welcome()
    {
        return view('welcome');
    }

    public function upload(Request $request)
    {
        // Step 1: Validate the incoming data (name, email, and file)
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'file' => 'required|file|mimes:jpg,jpeg,png,gif|max:10240' // File validation
        ]);

        Log::info('Validation passed. Proceeding with file upload.');

        // Step 2: Create a new student record
        $student = new Student;

        // Step 3: Assign name and email from the request
        $student->name = $request->name;
        $student->email = $request->email;

        // Step 4: Handle file upload
        //if ($request->hasFile('file') && $request->file('file')->isValid()) {
        // $image = $request->file('file');
        // $imagename = time() . '.' . $image->getClientOriginalExtension();
        //  $image->move(public_path('student'), $imagename);

        // Step 5: Save the image file name in the student record


        $image = $request->file;
        $imagename = time() . '.' . $image->getClientOriginalExtension();


        $request->file->move('student', $imagename);
        $student->image = $request->email;


        $student->image = $imagename;
        $student->save();




        // Step 6: Save the student data in the database



        // Step 7: Redirect with a success message
        // return redirect()->back()->with('success', 'Student uploaded successfully!');

    }
}






