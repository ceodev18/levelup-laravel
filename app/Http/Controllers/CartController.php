<?php

// app/Http/Controllers/CartController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart; // Import the Cart model
use App\Models\Product; // Import the Cart model
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    // Method to display the "add-to-cart" form
    public function showAddToCartForm()
    {
        // Retrieve and pass the list of products to the view
        $products = Product::all();
        return view('add-to-cart', compact('products'));
    }

    // Method to add a product to the cart
    public function addToCart(Request $request)
    {       
        
        $user = auth()->user();
        $cart = $user->cart;
        
        // Retrieve the user's cart, or create a new one if it doesn't exist
        $cart = $user->cart ?? new Cart(['user_id' => $user->id]);
        $cart->save();
        
        $cart->products()->detach();

        
        
        // // Loop through the selected products and quantities from the form
        foreach ($request->post('products') as $index =>$qty) {
            $product = Product::find($index);
            
            if ($product) {
                // Attach the product to the user's cart with the specified quantity
                $cart->products()->attach([
                    $product->id => ['quantity' => $qty],
                ]);
            }
        }
        
        // // Calculate the total price of items in the cart using a database query
        $totalPrice = $cart->products->sum(function ($product) {
            return $product->price * $product->pivot->quantity;
        });
        
        //dd($totalPrice);
        // // Update the cart's total_price
        $cart->total_price = $totalPrice;
        $cart->save();
        
        // Return the cart view with the updated total price
        return view('cart', compact('cart', 'totalPrice'));
    }

    // Other cart-related methods (viewing, updating, checkout, etc.)
    public function view()
    {
        $user = auth()->user();
        $cart = $user->cart;
        return view('cart', compact('cart'));
    }
}
