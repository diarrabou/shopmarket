<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store()
    {
        $items = CartItem::with('product')
            ->where('user_id', Auth::id())
            ->get();

        if ($items->isEmpty()) {
            return back();
        }

        $total = $items->sum(fn($item) => $item->product->prix * $item->quantite);

        $order = Order::create([
            'user_id' => Auth::id(),
            'total' => $total,
            'status' => 'en_attente',
        ]);

        foreach ($items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'image' => $item->product->image,
                'product_id' => $item->product_id,
                'quantite' => $item->quantite,
                'prix' => $item->product->prix,
            ]);
            // Diminuer le stock
            $item->product->decrement('stock', $item->quantite);
        }

        CartItem::where('user_id', Auth::id())->delete();

        return redirect()->route('orders.my');
    }

    public function myOrders()
    {
        $orders = Order::where('user_id', Auth::id())->latest()->get();
        return view('orders.my', compact('orders'));
    }

    public function pay(Order $order)
    {
        $order->update(['status' => 'payee']);
        return redirect()->route('orders.my');
    }

    public function sellerOrders()
    {
    $orders = OrderItem::with(['order', 'product'])
        ->whereHas('product', function ($query) {
            $query->where('vendeur_id', Auth::id());
        })
        ->latest()
        ->get();

    return view('seller.orders', compact('orders'));
    }

    
}