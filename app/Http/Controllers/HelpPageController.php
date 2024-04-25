<?php

namespace App\Http\Controllers;

use App\Models\HelpPage;
use Illuminate\Http\Request;

class HelpPageController extends Controller
{
       // Display the help page form
       public function index()
       {
           return view('help');
       }
   
       // Store the submitted form data
       public function store(Request $request)
       {
           $request->validate([
               'name' => 'required',
               'email' => 'required|email',
               'message' => 'required',
           ]);
   
           HelpPage::create($request->all());
   
           return redirect()->back()->with('success', 'Thank you! Your message has been submitted successfully.');
       }
}
