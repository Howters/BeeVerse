<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Ukm;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('search');
        $sort = $request->input('sort', 'asc');

        $products = Product::query();

        if ($query) {
            $products->where('name', 'LIKE', "%{$query}%");
        }

        $products->orderBy('price', $sort);

        $products = $products->paginate(9, ['*'], 'list_product');
        $count = $products->total();
        $user = auth()->user();
        $ukms = Ukm::all();
        // $ukms = Ukm::paginate(10, ['*'], 'list_ukm');
        return view('products', compact('products','ukms','count','user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // $request->validate([
        //     'Ukm' => 'required|exists:ukms,id',
        //     'Image' => 'required|image',
        //     'Name' => 'required|string|max:255',
        //     'Price' => 'required|numeric|min:0',
        //     'Stock' => 'required|integer|min:0',
        //     'ShortDescription' => 'required|string|max:255',
        //     'LongDescription' => 'required|string',
        //     'Color' => 'nullable|string|max:255',
        //     'Material' => 'nullable|string|max:255',
        // ]);
        $imageFileName = $request->file('Image')->getClientOriginalName();
        $imagePath = $request->file('Image')->storeAs('public/products/', $imageFileName);

        Product::create([
            'ukm_id' => $request->Ukm,
            'image' => 'storage/products/' . $imageFileName,
            'name' => $request->Name,
            'price' => $request->Price,
            'stock' => $request->Stock,
            'short_description' => $request->ShortDescription,
            'long_description' => $request->LongDescription,
            'color' => $request->Color,
            'material' => $request->Material,
        ]);

        return redirect('/products');
    }

    public function detail($id)
    {
        $product = Product::findOrFail($id);
        $ukm = Ukm::findOrFail($product->ukm_id);
        $similar_items = Product::where('id', '!=', $id)->take(3)->get();
        $product_count = Product::where('ukm_id',$ukm->id)->count();

        $order = Order::where('user_id', auth()->id())
                  ->where('product_id', $id)
                  ->first();

        return view('product-detail', compact('product','similar_items','product_count','order'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
