<?php

namespace App\Http\Livewire;

use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;

class StoreController extends Component
{

        public $user;
        #[Locked]
        public $isHaveStore = null;
        #[Validate('required')]
    

        public function mount()
        {
            // Fetch the latest user data from the database
            $this->user = User::find(Auth::id());
            if($this->user->store_name != null) {
                $this->isHaveStore = true;
            } 
            else {
                Log::info("dont have duh");
                $this->isHaveStore = false; // Set to false if the user doesn't have a store
            }
        }

        public function AddStore(Request $request)
        {
            $this->user = User::find(Auth::id());
            Log::info($this->store_name);

            if ($this->user && $this->user->store_name == null) {
                $this->user->store_name = $this->store_name;
                $this->user->save();
            }

            return redirect('/mystore');

        }

        public function render()
        {
            $user = Auth::user();

            $userId = $user->id;
            $username = $user->username;
            $email = $user->email;
            $store_name = $user->store_name;

            Log::info($userId);
            Log::info($username);
            Log::info($email);

            return view('store', compact('userId', 'username', 'email', 'store_name'))->layout('layouts.app');
        }
}
