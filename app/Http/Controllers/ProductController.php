<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    public function create() {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    public function store(Request $request) {
        dd($request->file('thumbnail')->getClientOriginalName());

        $request->validate(
            [
                'name' => 'required|unique:categories,name',
            ],
            [
                'name.required' => 'Không được để trống tên danh mục',
                'name.unique' => 'Danh mục đã tồn tại, vui lòng nhập tên khác',
            ]
        );
        
        // Upload file
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('upload/product/thumbnails','public');
        }

        if ($request->hasFile('images')) {
            foreach($request->images as $image) {
                $imagesPath[] = $image->store('upload/product/images','public');
            }
        }

        $product = new Product();

        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->thumbnail = $thumbnailPath;
        $product->price = $request->price;
        $product->price_sale = $request->price_sale ?? 0;
        $product->description = $request->description;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->quantity = $request->quantity;
        $product->save();



        return redirect()->route('products.index')->with('msg', 'Thêm sản phẩm thành công');
    }
}
