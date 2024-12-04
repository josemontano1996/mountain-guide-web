<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
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
        $categories = Category::all();


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
    public function store(CategoryRequest $request)
    {
        try {
            Category::createFromValidatedData($request->validated());

            return redirect()->route('admin.category.index')->with('success', 'Categoría creada exitosamente.');

        } catch (Exception $e) {

            Log::error('Error when deleting category', ['exception' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Error guardando categoría');

        }
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
    public function update(CategoryRequest $request, Category $category)
    {
        try {
            $success = Category::updateFromValidatedData($category, $request->validated());

            if (!$success) {
                return redirect()->back()->with('error', 'Instancia de categoría no actualizada.');
            }

            return redirect()->route('admin.category.index')->with('success', 'Categoría editada exitosamente.');

        } catch (Exception $e) {

            Log::error('Error when deleting category', ['exception' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Error editando categoría');

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            $category->deleteOrFail();

            return redirect()->route('admin.category.index')->with('success', 'Categoria eliminada con éxito.');
        } catch (Exception $e) {

            Log::error('Error when deleting category', ['category_id' => $category->id, 'exception' => $e->getMessage()]);

            return redirect()->route('admin.category.index')->withErrors('Error al eliminar la categoría.');
        }

    }
}
