<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();

        return view('admin.category.index', compact('categories'));
    }

    public function create() {
        $categories = Category::all();
        return view('admin.category.create', compact('categories'));
    }

    
    public function store(Request $request) {
        $request->validate(
            [
                'name' => 'required|unique:categories,name',
            ],
            [
                'name.required' => 'Không được để trống tên danh mục',
                'name.unique' => 'Danh mục đã tồn tại, vui lòng nhập tên khác',
            ]
        );
            
        Category::create([
            'name' => $request->name,
            'parent_id' => $request->parent_id
        ]);
        
        return redirect()->route('categories.index')->with('msg', 'Thêm danh mục thành công');
    }
        
    public function edit(Category $category) {
        $categories = Category::all();
        return view('admin.category.edit', compact('category', 'categories'));
    }

    public function update(Category $category, Request $request) {
        $request->validate(
            [
                'name' => "required|unique:categories,name,$category->id",
            ],
            [
                'name.required' => 'Không được để trống tên danh mục',
                'name.unique' => 'Danh mục đã tồn tại, vui lòng nhập tên khác',
            ]
        );

        $category->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id
        ]);

        return back()->with('msg', 'Cập nhật danh mục thành công');
    }

    public function destroy(Category $category) {
        $category->delete();
        return redirect()->route('categories.index')->with('msg', 'Xóa danh mục thành công');
    }

    public function trash() {
        $categories = Category::onlyTrashed()->get();
        return view('admin.category.trash', compact('categories'));
    }

    public function restoreCategory($categoryId) {
        Category::withTrashed()->where('id', $categoryId)->restore();
        // $category->restore();
        return redirect()->back()->with('msg', 'Khôi phục danh mục thành công');
    }

    public function forceDelete($categoryId) {
        Category::withTrashed()->where('id', $categoryId)->forceDelete();
        return redirect()->back()->with('msg', 'Danh mục đã được xóa vĩnh viễn');
    }
}
