<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $categoryId = $request->input('category_id');
        $categories = Category::all();

        $posts = Post::when($categoryId, function ($query) use ($categoryId) {
            $query->where('category_id', $categoryId);
        })->with('category')->latest()->get();

        return view('posts.index', compact('posts', 'categories', 'categoryId'));
    }

    public function show(Post $post) {
        return view('posts/show', compact('post'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('posts/create', compact('categories'));
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
        ]);

        Post::create($request->all());
        return redirect()->route('posts.index');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }


    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
        ]);

        $validated['slug'] = Str::slug($request->title);

        $post->update($validated);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }


    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }

}
