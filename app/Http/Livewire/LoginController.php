<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\User;
use Exception;

class LoginController extends Component
{
    #[Validate('required')] 
    public $username_or_email = '';
    #[Validate('required')] 
    public $password = '';

    private $pattern = '/^[\w\-\.\+]+@([\w-]+\.)+[\w-]{2,}$/';

    public function login(Request $request)
    {
        if (Auth::check()) {
            Log::info('Already Authenticaated');
            return redirect()->intended('/home');
        }

        try {
            $this->validate();
            Log::info($this->username_or_email);
            $isEmail = (bool) preg_match($this->pattern, $this->username_or_email);

            if ($isEmail) {
                if (Auth::attempt(['email' => $this->username_or_email, 'password' => $this->password])) {
                    $user = User::where('email',  $this->username_or_email)->first();
                    $this->dispatch('user-login', userId: $user->id);
                    $request->session()->regenerate();
                    return redirect()->intended('/home');
                }
                
                $this->password = '';
                $this->addError('email', 'The email or password do not match our records.');
                return back()->withErrors([
                    'email' => 'The provided credentials do not match our records.',
                ])->onlyInput('email');
            
            }
            else {
                if (Auth::attempt(['username' => $this->username_or_email, 'password' => $this->password])) {
                    $user = User::where('username',  $this->username_or_email)->first();
                     $this->dispatch('user-login', userId: $user->id);
                     $request->session()->regenerate();
                     session()->regenerate();
                     return redirect()->intended('/home');
                }

                $this->password = '';
                $this->addError('username', 'The username or password do not match our records.');
                return back()->withErrors([
                    'username' => 'The provided credentials do not match our records.',
                ])->onlyInput('email');
            }

        } catch (ModelNotFoundException $e) {
            Log::error('User not found: ' . $e->getMessage());

            return back()->withErrors([
                $isEmail ? 'email' : 'user' => 'Identity not found',
            ])->onlyInput('email');            
            
        } catch (Exception $e) {
            Log::error('Login error: ' . $e->getMessage());
            return back()->withErrors([
                $isEmail ? 'email' : 'user' => 'Identity not found',
            ])->onlyInput('email');  
        }
    }

    public function mount()
    {
        if (Auth::check()) {
            Log::info('Already Authenticaated');
            return redirect()->intended('/home');
        }
    }

    public function Log(string | \Stringable $message): void
    {
        $this->dispatch('ConsoleLog', $message);
    }

    public function Error(string | \Stringable $message): void
    {
        $this->dispatch('ConsoleError', $message);
    }

    public function render()
    {
        return view('login')
            ->layout('layouts.app');
    }
}
