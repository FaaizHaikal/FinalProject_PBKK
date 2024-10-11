<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;
use Tuupola\Ksuid;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Validate; 

class RegisterController extends Component
{
    #[Validate('required')] 
    public $email = '';
    #[Validate('required')] 
    public $username = '';
    #[Validate('required')] 
    public $password = '';

    public $error_registered = false;


    public function register(Request $request)
    {
        $this->error_registered = false;
        $this->validate();
        Log::info($this->username);

        $ksuid = (string) new Ksuid;
       
        try {
            // Create a new user instance
            $user = User::create([
                'id' => $ksuid, // Make sure $ksuid is defined and valid
                'username' => $this->username,
                'email' => $this->email,
                'password' => Hash::make($this->password), 
            ]);
    
            Log::info('User created: ', ['username' => $user->username]);
            
            // Optionally, send user ID back to the frontend
            $this->dispatch('user-created', userId:  $ksuid);
            $this->success_registered = true;
            return response()->json(['message' => 'User created successfully!', 'userid' =>  $ksuid], 201);
    
        } catch (ModelNotFoundException $e) {
            Log::error('User creation failed: ' . $e->getMessage());
            return response()->json(['error' => 'User creation failed.'], 404);
        } catch (Exception $e) {
            Log::error('User creation failed: ' . $e->getMessage());
            return response()->json(['error' => 'An unexpected error occurred.'], 500);
        }
    }
 
    public function mount()
    {
        if (Auth::check()) {
            Log::info('Already Authenticated');
            return redirect()->intended('/');
        }
    }
    public function render(): mixed
    {
        return view('register')
            ->layout('layouts.app');
    }
}
