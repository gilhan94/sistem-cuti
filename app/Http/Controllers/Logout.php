<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Auth;

class Logout extends Controller
{
    function logout()
    {
        try {
            Auth::logout();
            return redirect(route("login"))->with("success", "Logged Out");
        } catch (Exception $e) {
            return back("")->with("danger", $e->getMessage());
        }
    }
}
