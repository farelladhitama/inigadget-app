<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use App\Models\OsType;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // app/Http/Controllers/ProductController.php
    public function index(Request $request)
    {
        $brands = Brand::all();
        $osTypes = OsType::all();

        $query = Product::query();

        if ($request->filled('brand')) {
            $query->where('brand_id', $request->brand);
        }

        if ($request->filled('os_type')) {
            $query->where('os_type_id', $request->os_type);
        }

        $products = $query->get(); // tanpa pagination        

        return view('pages.product', compact('products', 'brands', 'osTypes'));
    }


}
?>