<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'users' => User::count(),
            'vendeurs' => User::where('role', 'vendeur')->count(),
            'acheteurs' => User::where('role', 'acheteur')->count(),
            'products' => Product::count(),
            'categories' => Category::count(),
            'orders' => Order::count(),
            'ca' => Order::where('status', 'payee')->sum('total'),
        ]);
    }
}
