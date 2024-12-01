<?php

namespace App\Http\Livewire;

use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Storage;
use Exception;

class StoreController extends Component
{

        use WithFileUploads;

        public $user;
        #[Locked]
        public $isHaveStore = null;
        #[Validate('required')]
        public $store_name = null;
        public $products = [];

        // New product fields
        public $product_name = null;
        public $product_description = null;
        public $product_image = null;
        public $product_stock = 1;
        public $product_price = null;
        public $product_category = "";
        public $product_id = null;
        public $product_image_url = null;

        // form button
        public $isFormHidden = true;

        public function setFormHidden()
        {
            if( $this->isFormHidden == true) {
                $this->isFormHidden = false;
            } else {
                $this->isFormHidden = true;

                $this->product_name = null;
                $this->product_description = null;
                $this->product_image = null;
                $this->product_stock = 1;
                $this->product_price = null;
                $this->product_category = "";
                $this->product_id = null;
            }
            Log::info($this->isFormHidden);
        }

        public function incrementStock()
        {
            $this->product_stock++;
        }

        public function decrementStock()
        {
            if (is_nan($this->product_stock) || $this->product_stock <= 1) {
                $this->product_stock = 1;
            } else if ($this->product_stock > 1) {
                $this->product_stock--;
            }
        }

        public function updatedProductStock()
        {
            if (is_nan($this->product_stock) || $this->product_stock <= 0) {
                $this->product_stock = 1;
            }
        }

        public function mount()
        {
            // Fetch the latest user data from the database
            $this->user = User::find(Auth::id());
            if($this->user->store_name != null) {
                $this->isHaveStore = true;
                $this->store_name = $this->user->store_name;
                $this->products = Product::where('user_id', $this->user->id)->get();
            } 
            else {
                Log::info("dont have duh");
                $this->isHaveStore = false; // Set to false if the user doesn't have a store
            }
        }

        public function AddStore(Request $request)
        {
            $this->user = User::find(Auth::id());

            if ($this->user && $this->user->store_name == null) {
                $this->user->store_name = $this->store_name;
                $this->user->save();
            }

            return redirect('/mystore');
        }

        public function AddProduct(Request $request)
        {
            if ($this->product_id != null) {
                $this->UpdateProduct();

                return;
            }

            $this->user = User::find(Auth::id());
            
            try {
                $base64Image = base64_encode(file_get_contents($this->product_image->getRealPath()));

            } catch (Exception $e) {
                Log::info($e);
            }

            try {
                $newProduct = Product::create([
                    'name' => $this->product_name,
                    'description' => $this->product_description,
                    'image' => $base64Image,
                    'stock' => $this->product_stock,
                    'price' => $this->product_price,
                    'category' => $this->product_category,
                    'user_id' => $this->user->id,
                ]);

                $this->reset('product_name', 'product_description', 'product_image', 'product_stock', 'product_price', 'product_category');

                return redirect('/mystore');
            } catch (Exception $e) {
                Log::info($e);
            }
        }

        public function RemoveProduct($productId)
        {
            $product = Product::find($productId);
            if ($product) {
                $product->delete();
                $this->products = Product::all();
            } 

        }

        public function UpdateProduct()
        {
            try {
                if ($this->product_image != null) {
                    $base64Image = base64_encode(file_get_contents($this->product_image->getRealPath()));
                } else {
                    $base64Image = $this->product_image_url;
                }
            } catch (Exception $e) {
                Log::info($e);
            }

            Log::info("ImagePath: " . $base64Image);

            try {
                $product = Product::find($this->product_id);
                $product->name = $this->product_name;
                $product->description = $this->product_description;
                $product->image = $base64Image;
                $product->stock = $this->product_stock;
                $product->price = $this->product_price;
                $product->category = $this->product_category;
                $product->save();

                $this->reset('product_name', 'product_description', 'product_image', 'product_stock', 'product_price', 'product_category');

                return redirect('/mystore');
            } catch (Exception $e) {
                Log::info($e);
            }
        }

        public function EditProduct($productId)
        {
            $product = Product::find($productId);
            if ($product) {
                $this->product_id = $product->id;
                $this->product_name = $product->name;
                $this->product_description = $product->description;
                $this->product_stock = $product->stock;
                $this->product_price = $product->price;
                $this->product_category = $product->category;
                $this->product_image_url = $product->image;
            }

            $this->setFormHidden();
        }

        public function render()
        {
            $user = User::find(Auth::id());

            $userId = $user->id;
            $username = $user->username;
            $email = $user->email;
            $store_name = $user->store_name;
            $this->products = Product::where('user_id', $userId)->get();

            return view('store', compact('userId', 'username', 'email', 'store_name'))->layout('layouts.app');
        }
}