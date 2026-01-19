<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('category')->latest()->get();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'nullable|exists:categories,id',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'title' => $request->title,
            'slug' => Str::slug($request->title), // Basic slug generation, might overlap, but MVP
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'is_published' => $request->has('is_published'),
            'published_at' => $request->has('is_published') ? now() : null,
            'user_id' => Auth::id(),
        ];

        if ($request->hasFile('cover_image')) {
             $path = $request->file('cover_image')->store('posts', 'public');
             $data['cover_image'] = '/storage/' . $path;
        }

        Post::create($data);

        return redirect()->route('admin.posts.index')->with('success', 'Post created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
         $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'nullable|exists:categories,id',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'category_id' => $request->category_id,
        ];
        
        // Handle publishing toggle - logic: if it WAS published and stays published, keep date. If it WASN'T and now IS, set date.
        if ($request->has('is_published')) {
            $data['is_published'] = true;
            if (!$post->is_published) {
                $data['published_at'] = now();
            }
        } else {
             $data['is_published'] = false;
             $data['published_at'] = null; 
        }

        if ($request->hasFile('cover_image')) {
            if ($post->cover_image) {
                $oldPath = str_replace('/storage/', '', $post->cover_image);
                Storage::disk('public')->delete($oldPath);
            }
             $path = $request->file('cover_image')->store('posts', 'public');
             $data['cover_image'] = '/storage/' . $path;
        }

        $post->update($data);

        return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->cover_image) {
            $oldPath = str_replace('/storage/', '', $post->cover_image);
            Storage::disk('public')->delete($oldPath);
        }
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Post deleted successfully.');
    }
}
