<?php

namespace App\Livewire;

use Exception;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{
    #[Validate("required")]
    public $name = "";
    #[Validate("required")]
    public $password = "";
    public function authLogin()
    {
        try {
            if (Auth::attempt($this->only(["name", "password"]))) {
                redirect(route("dashboard"))->with("success", "Selamat Datang <b class='text-uppercase'>" . Auth::user()->name . "</b>");
            } else {
                throw new Exception("Username atau Password salah !.");
            }
        } catch (Exception $e) {
            redirect("/")->with("danger", $e->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.login');
    }
}
