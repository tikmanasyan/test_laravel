<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index() {
        //gnalu e logini ej
    }

    public function register_view() {
        //gnalu e registraciayi ej
    }

    public function register() {
        //kazmakerpelu e registracia
        $keys = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", 0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
        $code = "";
        for($i = 1; $i <= 12; $i++) {
            $code .= $keys[rand(0, count($keys) - 1)];
        }

        return $code;

    }

    public function login(LoginRequest $request) {
        //kazmakerpelu e login
    }

    public function verify(Request $request) {
        //kazmakerpelu e ogtvoxi verifikacia
    }

    public function logout() {
        //ogtvoxi durs gal@ hamakargic
    }
}
