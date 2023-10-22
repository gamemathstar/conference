<?php

namespace App\Http\Controllers;

use App\Conference;
use Illuminate\Http\Request;

class AdminConferenceController extends Controller
{
    public function index()
    {
        $conferences = Conference::all();
        return view('admin.conferences.index', compact('conferences'));
    }

    public function create()
    {
        return view('admin.conferences.create');
    }

    public function store(Request $request)
    {
        // Validate and store the conference
        // Assuming your form has fields like title, description, start_date, end_date, image_path

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            //'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload (you may need to adjust this based on your requirements)
        $imagePath = $request->file('image_path')->store('conferences', 'public');

        Conference::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            //'image_path' => $imagePath,
        ]);

        return redirect()->route('admin.conferences.index')->with('success', 'Conference created successfully!');
    }

    // Add other CRUD methods as needed (edit, update, delete)
}
