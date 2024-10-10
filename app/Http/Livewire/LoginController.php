<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class LoginController extends Component
{
    #[Validate('required')] 
    public $username_or_email = '';
    #[Validate('required')] 
    public $password = '';

    public function login(Request $request)
    {
        $this->validate();
        Log::info($this->username_or_email);

        if (Auth::attempt(['email' => $this->username_or_email, 'password' => $this->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

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
