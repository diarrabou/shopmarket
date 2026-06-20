<?php 
 
namespace App\Http\Controllers; 
 
use App\Models\Product; 
use App\Models\CartItem; 
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth; 
 
class CartController extends Controller 
{ 
    public function index() 
    { 
        $items = CartItem::with('product') 
            ->where('user_id', Auth::id()) 
            ->get(); 
 
        $total = $items->sum(fn($item) => $item->product->prix * $item->quantite); 
 
        return view('cart.index', compact('items', 'total')); 
    } 
 
    public function add(Product $product) 
    { 
        $item = CartItem::where('user_id', Auth::id()) 
            ->where('product_id', $product->id) 
            ->first(); 
 
        if ($item) { 
            $item->increment('quantite'); 
        } else { 
            CartItem::create([ 
                'user_id' => Auth::id(), 
                'product_id' => $product->id, 
                'quantite' => 1, 
            ]); 
        } 
 
        return redirect()->route('cart.index'); 
    } 
 
    public function remove(CartItem $cartItem) 
    { 
        $cartItem->delete(); 
        return back(); 
    } 
}