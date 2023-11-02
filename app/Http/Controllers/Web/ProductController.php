<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\URL;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function dashboard(Request $request)
    {
        return Inertia::render('Dashboard');
    }

    public function store(StoreProductRequest $request)
    {
        $data = $request->all();

        $products = Product::query()->create(
            [
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'product_name' => $data['product_name'],
                'manufacturer_date' =>  $data['manufacturer_date'],
                'product_mrp' => $data['product_mrp'],
                'product_img' => Request::file('product_img') ? Request::file('product_img')->store('products') : null,
            ],
        );

        return redirect('products/list')->with('success', 'Data saved successfully!');
    }

    public function productsList(Request $request)
    {
        return Inertia::render('Products/List', [
            'products' => Product::all(),
        ]);
    }

    public function productsEdit(Product $product)
    {
        return Inertia::render('Products/Edit', [
            'product' => [
                'id' => $product->id,
                "first_name" =>  $product->first_name,
                "last_name" =>  $product->last_name,
                "product_name" =>  $product->product_name,
                "product_mrp" => $product->product_mrp,
                "manufacturer_date" => $product->manufacturer_date,
                // 'product_img' => $product->product_img ? URL::route('image', ['path' => $product->product_img, 'w' => 60, 'h' => 60, 'fit' => 'crop']) : null,
                // 'product_img' => $product->product_img,

            ],
        ]);
    }

    public function productsUpdate(EditProductRequest $request, Product $product)
    {
        $data = $request->all();
        info($data);

        $product = Product::query()
            ->where('id', $product->id)
            ->first();

        if ($product == null) {
            return "Error";
        }

        if (Request::file('product_img')) {
            info("in if");
            $product->update(['product_img' => Request::file('product_img')->store('products')]);
        }

        $product->first_name = $data['first_name'];
        $product->last_name = $data['last_name'];
        $product->product_name = $data['product_name'];
        $product->product_mrp = $data['product_mrp'];
        $product->manufacturer_date = $data['manufacturer_date'];
        $product->save();

        return redirect('products/list')->with('success', 'Data saved successfully!');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return Redirect::back()->with('success', 'Product deleted.');
    }
}
