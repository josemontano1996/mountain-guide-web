<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Log;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::categoriesWithEventCount()->orderBy('name', 'asc')->get();


        return view('admin/category.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:categories,name,' . $request->get('name'),
            'is_main' => 'nullable'
        ]);
        try {
            Category::create($validatedData);

        } catch (Exception $e) {
            Log::error('Error when deleting category', ['exception' => $e->getMessage()]);
        }

        return redirect()->route('admin.category.index')->with('success', 'Categoría creada exitosamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin/category.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id,
            'is_main' => 'nullable'
        ]);

        $category->update($validatedData);

        return redirect()->route('admin.category.index')->with('success', 'Categoria actualizada con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            $category->deleteOrFail();
        } catch (Exception $e) {
            Log::error('Error when deleting category', ['category_id' => $category->id, 'exception' => $e->getMessage()]);
            return redirect()->route('admin.category.index')->withErrors('Error al eliminar la categoría.');
        }

        return redirect()->route('admin.category.index')->with('success', 'Categoria eliminada con éxito.');
    }
}
