<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Exception;
use Log;

class LandingController extends Controller
{
    public function index()
    {
        return view('landingPage');
    }
}