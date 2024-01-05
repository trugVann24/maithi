<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $banners = DB::table('banners')
            ->select('banners.*')
            ->where('status', '=', 1)
            ->get();
        $brands = DB::table('brands')
            ->select('brands.id', 'brands.image')
            ->where('status', '=', 1)
            ->get();

        $categories = DB::table('categories')
            ->select('categories.id', 'categories.name')
            ->where('status', '=', 1)
            ->limit(8)
            ->get();
        $products = DB::table('products')
            ->select('products.id', 'products.name', 'products.thumb', 'products.price_default', 'products.slug')
            ->where('status', '=', 1)
            ->limit(6)
            ->get();
        return view('pages.user.index', compact('banners', 'brands', 'categories', 'products'));
    }

    public function productDetail($slug) {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('pages.user.product-details', compact('product'));
    }
}
