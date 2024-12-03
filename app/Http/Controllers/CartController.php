<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Exception;
use Log;

class CartController extends Controller
{
    // Show the cart page
    public function index()
    {
        $cart = session()->get('cart', []);

        $user = Auth::user();
        $userId = $user->id;
        $username = $user->username;
        $email = $user->email;

        return view('cart', compact('cart','userId', 'username', 'email'));
    }

    // Add product to cart
    public function addToCart($productId)
    {
        try {
            // Retrieve the product from the database
            $product = Product::findOrFail($productId);
    
            // Get the current cart from the session or initialize as an empty array
            $cart = session()->get('cart', []);
    
            // Check if the product already exists in the cart
            if (isset($cart[$productId])) {
                $cart[$productId]['quantity']++;
            } else {
                $cart[$productId] = [
                    'name' => $product->name,
                    'price' => $product->price,
                    'image' => $product->image,
                    'quantity' => 1,
                ];
            }
    
            // Store the updated cart in the session
            session()->put('cart', $cart);
    
            Log::info('Updated Cart: ');
    
            return response()->json(['success' => true, 'message' => 'Product added to cart!']);
            
        } catch (\Exception $e) {
            Log::error('Error adding to cart: ' . $e->getMessage());
            
            return response()->json(['success' => false, 'message' => 'An error occurred while adding to the cart.']);
        }
    }

    // Remove a product from the cart
    public function removeFromCart($productId)
    {
        // Get the current cart from the session
        $cart = session()->get('cart', []);

        // Remove the product from the cart
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
        }

        // Store the updated cart in the session
        session()->put('cart', $cart);

        return redirect()->route('cart.index');
    }

    public function updateCart(Request $request, $productId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = session()->get('cart', []);
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('message', 'Cart updated successfully!');
    }

    // Clear the cart
    public function clearCart()
    {
        // Clear the session cart
        session()->forget('cart');

        return redirect()->route('cart.index');
    }
}
