<?php

namespace App\Http\Controllers;

use App\Http\Services\CategoryService;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(CategoryService $categoryService)
    {
        $categories = $categoryService->getAll();
        return view('category.index', compact('categories'));
    }

    public function save(Request $request, CategoryService $categoryService)
    {
        $categoryService->create($request);
        $request->session()->flash('message', 'Salvo com sucesso!');
        return redirect()->route('categories_list');
    }

    public function edit(Request $request, CategoryService $categoryService)
    {
        $category = Category::find($request->id);
        $categoryService->update($category, $request);
        $request->session()->flash('message', 'Alterado com sucesso!');
        return redirect()->route('categories_list');

    }

    public function drop(Request $request, CategoryService $categoryService)
    {
        $categoryService->destroy($request);
        return redirect()->route('categories_list');
    }
}
