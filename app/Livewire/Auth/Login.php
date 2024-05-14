<?php
namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $email;
    public $password;
  

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            $user = Auth::user();
            // Redirect users based on their type
            if ($user->type === 'admin') {
                return redirect()->route('home');
            } elseif ($user->type === 'user') {
                return redirect()->route('home');
            }
        } else {
            return redirect()->route('login')->with('error', 'The provided credentials do not match our records.');
        }
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect()->to('/login');
    }


    public function render()
    {
        return view('livewire.auth.login');
    }
}
