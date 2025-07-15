<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use App\Models\OsType;

class PageController extends Controller
{
    public function home()
    {
        $products = Product::with(['brand', 'osType'])->latest()->take(8)->get();
        return view('pages.home', compact('products'));
    }

    public function products()
    {
        $products = Product::with(['brand', 'osType'])->paginate(12);
        return view('pages.product', compact('products'));
    }

    public function categories()
    {
        $brands = Brand::all();
        $osTypes = OsType::all();
        return view('pages.categories', compact('brands', 'osTypes'));
    }

    public function about()
    {
        return view('pages.about');
    }
}
