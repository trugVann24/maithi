<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::paginate(10);
        return view('pages.admin.category.index', [
            'categories' => $categories
        ]);
    }
    public function create(): View
    {
        return view('pages.admin.category.create');
    }
    public function store(CategoryRequest $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->status = $request->status == true ? '1' :'0';
        $category->slug = $request->slug;
        $category->save();
        return redirect()->route('admin.categories.index')->with("success", "Thêm danh mục thành công");
    }

    public function edit($category){
        $categories = Category::findOrFail($category);
        return view('pages.admin.category.edit', compact('categories'));
    }

    public function update(CategoryRequest $request, Category $category){
        $category->name = $request->name;
        $category->status = $request->status == true ? '1' :'0';
        $category->slug = $request->slug;
        $category->update();

        return redirect()->route('admin.categories.index')->with("success", "Sửa danh mục thành công");
    }

    public function destroy(Category $category){
        $category->delete();
        return redirect()->back()->with("success", "Xoá danh mục thành công");
    }
}
