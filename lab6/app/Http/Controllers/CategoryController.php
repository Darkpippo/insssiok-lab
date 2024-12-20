<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request) {
        $search = $request->input('search');
        $categories = Category::where('name', 'LIKE', "%{$search}%")->get();

        return view('categories.index', compact('categories', 'search'));
    }

    public function show(Category $category) {
        $posts = $category->posts();
        return view('categories/show', compact('category', 'posts'));
    }

    public function create() {
        return view('categories/create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
        ]);

        Category::create($request->only('name'));
        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function edit(Category $category) {
        return view ('categories/edit', compact('category'));
    }

    public function update(Request $request, Category $category) {
        $request->validate([
            'name' => 'required',
        ]);

        $category->update($request->only('name'));
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
