<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        if($user->is_admin == 1){
            $orders = Order::all();
        }
        else{
            $orders = Order::where('user_id',$user->id)->get();
        }

        return view('orders', compact('orders','user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // $request->validate([
        //     'product_id' => 'required|integer|exists:products,id',
        //     'ukm_id' => 'required|integer|exists:ukms,id',
        //     'payment_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);

        $imageFileName = $request->file('payment_image')->getClientOriginalName();
        $imagePath = $request->file('payment_image')->storeAs('public/payment_images/', $imageFileName);

        Order::create([
            'ukm_id' => $request->input('ukm_id'),
            'user_id' => auth()->id(),
            'product_id' => $request->input('product_id'),
            'payment_image' => 'storage/payment_images/' . $imageFileName,
            'payment_status' => "pending",
        ]);
        // 'image' => 'storage/products/' . $imageFileName,

        return redirect('/products');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function verify (Request $request)
    {
        $orderId = $request->input('order_id');
        $order = Order::find($orderId);
        $order->payment_status = "paid";
        $order->save();

        return redirect()->back()->with('success', 'Payment status updated successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $Order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $Order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $Order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $Order)
    {
        //
    }
}
