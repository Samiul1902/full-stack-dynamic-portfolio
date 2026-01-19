<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'message' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('testimonials', 'public');
        }

        Testimonial::create([
            'name' => $request->name,
            'role' => $request->role,
            'message' => $request->message,
            'image_url' => $imagePath ? '/storage/' . $imagePath : null,
        ]);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'message' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'name' => $request->name,
            'role' => $request->role,
            'message' => $request->message,
        ];

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($testimonial->image_url) {
                $oldPath = str_replace('/storage/', '', $testimonial->image_url);
                Storage::disk('public')->delete($oldPath);
            }
            $imagePath = $request->file('image')->store('testimonials', 'public');
            $data['image_url'] = '/storage/' . $imagePath;
        }

        $testimonial->update($data);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
         if ($testimonial->image_url) {
            $oldPath = str_replace('/storage/', '', $testimonial->image_url);
            Storage::disk('public')->delete($oldPath);
        }
        $testimonial->delete();
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial deleted successfully.');
    }
}
