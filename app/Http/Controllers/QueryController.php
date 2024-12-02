<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Log;

class QueryController extends Controller
{
    public function index($category)
    {
        $user = Auth::user();
    
        $userId = $user->id;
        $username = $user->username;
        $email = $user->email;
    
        // Filter products by the category received from the URL
        $products = Product::where('category', $category)->get();
    
        return view('home', compact('userId', 'username', 'email', 'products'));
    }
    

}
