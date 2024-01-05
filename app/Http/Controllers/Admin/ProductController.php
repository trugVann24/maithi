<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Attribute;
use App\Models\AttributeOption;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Sku;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('pages.admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $brands = Brand::pluck('name', 'id');
        $attributes = Attribute::with('attributeOptions')->get();

        return view('pages.admin.product.create', compact('attributes', 'categories', 'brands'));
    }

    public function store(ProductRequest $request)
    {
        $imageName = null;
        if ($request->hasFile('product.thumb')) {
            $imageName = time() . '.' . $request->file('product.thumb')->getClientOriginalExtension();
            $request->file('product.thumb')->move(public_path('image/products'), $imageName);
        }
        $product = new Product();
        $product->category_id = $request->input('product.category_id');
        $product->brand_id = $request->input('product.brand_id');
        $product->name = $request->input('product.name');
        $product->thumb = $imageName;
        $product->slug = $request->input('product.slug');
        $product->price_default = $request->input('product.price_default');
        $product->description = $request->input('product.description');
        $product->status = $request->has('product.status') ? '1' : '0';
        $product->save();

//        // Tạo SKU sau khi đã có thông tin $product
        $skuData = $request->input('sku');
        foreach ($skuData['code'] as $key => $code) {
            Sku::create([
                'product_id' => $product->id,
                'code' => $code,
                'quantity' => $skuData['quantity'][$key],
                'price' => $skuData['price'][$key],
            ]);
        }

//        // Lưu thông tin attribute options và liên kết chúng với SKU
        $selectedOptions = json_decode($request->input('selected_options'), true);

        if (is_array($selectedOptions)) {
            foreach ($selectedOptions as $option) {
                $attributeOption = AttributeOption::firstOrCreate([
                    'attribute_id' => $option['attribute_id'],
                    'value' => $option['value'],
                ]);

                foreach ($skuData['code'] as $key => $code) {
                    Sku::find($key)->attributeOptions()->attach($attributeOption->id);
                }
            }
        }
        return redirect()->route('admin.products.index')->with('success', 'Sản phẩm đã được thêm thành công');
    }

}
