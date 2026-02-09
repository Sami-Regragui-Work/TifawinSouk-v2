<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = request()->user()->orders()->with('products')->latest()->paginate(10);
        return view('client.orders.index', compact('orders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        return DB::transaction(function () use ($request) {
            $user = $request->user();
            $cart = $user->cart()->with('products')->firstOrFail();

            $order = Order::create(['client_id' => $user->id]);

            foreach ($cart->products as $product) {
                $order->products()->attach(
                    $product->id,
                    [
                        'quantity' => $product->pivot->quantity,
                        'price_at_purchase' => $product->price
                    ]
                );

                $product->decrement('stock', $product->pivot->quantity);
            }

            $cart->products()->detach();

            return back()->with('success', 'Order placed successfully!');

        });
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $order->load('products');
        return view('client.orders.show', compact('order'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->products()->detach();
        $order->delete();

        return back()->with('success', 'Order cancelled successfully');
    }
}
