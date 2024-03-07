<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sticker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StickersController extends Controller
{
    public function index() 
    {
        $stickers = Sticker::all();
        return view('admin.stickers.index', compact('stickers'));
    }

    public function store(Request $request)
        {
            // Validate the request
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules as needed
            ]);

            // Store the image
            $imagePath = $request->file('image')->store('stickers');

            // Create a new Sticker instance
            $sticker = new Sticker();
            $sticker->image = $imagePath;
            $sticker->save();

            // Redirect back with success message
            return redirect()->route('admin.stickers')->with('success', 'Sticker created successfully!');
        }

        public function destroy(Sticker $sticker)
        {
            // Delete the sticker
            $sticker->delete();

            // Redirect back with success message
            return redirect()->route('admin.stickers')->with('success', 'Sticker deleted successfully!');
        }

}
