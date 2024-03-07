<?php

namespace App\Http\Controllers\Admin;


use App\Models\Gift;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GiftsController extends Controller
{
    public function index()
    {
        $gifts = Gift::all();
        return view('admin.gifts.index', compact('gifts'));
    }


    public function store(Request $request)
        {
            // Validate the request
            $request->validate([
                'cost' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules as needed
            ]);

            // Store the image
            $imagePath = $request->file('image')->store('gifts');

            // Create a new Sticker instance
            $gift = new Gift();
            $gift->cost = $request->cost; 
            $gift->image = $imagePath;
            $gift->save();

            // Redirect back with success message
            return redirect()->route('admin.gifts')->with('success', 'Gifts created successfully!');
        }

        public function destroy(Gift $gift)
        {
            // Delete the sticker
            $gift->delete();

            // Redirect back with success message
            return redirect()->route('admin.gifts')->with('success', 'Gift deleted successfully!');
        }

}
