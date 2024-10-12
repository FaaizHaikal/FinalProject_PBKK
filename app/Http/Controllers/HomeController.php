<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Log;

class HomeController extends Controller
{
    public function index()
    {
       $user = Auth::user();

       $userId = $user->id;
       $username = $user->username;
       $email = $user->email;
       $products = Product::all();

       return view('home', compact('userId', 'username', 'email', 'products'));
    }

    public function SignOut(Request $request)
    {
        try {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            
            return redirect('/auth/login');
        }
        catch (Exception $e) {
            return response()->json(['success' => false, 'message' => 'Logout failed. Please try again.']);
        }
    }

    public function hello(Request $request)
{
    return response()->json(['success' => true, 'message' => 'Hello World']);
}

}
