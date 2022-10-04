<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Mail\SendMailVerification;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends BaseController
{
    public function index() {
        //gnalu e logini ej
    }

    public function register_view() {
        //gnalu e registraciayi ej
        return view("auth.register");
    }

    public function register(RegisterRequest $request) {
        //kazmakerpelu e registracia
        $avatar = "";
        $verify_code = Parent::make_hashed_code(6);
        if($request->file("avatar")) {
            $ext = $request->file("avatar")->extension();
            $avatar = time() . "." . $ext;
            $request->file("avatar")->move(
                public_path("assets/uploads/"), $avatar);
        }

        $data = [
            "name" => $request['full_name'],
            "birth_date" => $request['birth_date'],
            "gender" => $request['gender'],
            "avatar" => $avatar,
            "email" => $request['email'],
            "password" => Hash::make($request['password']),
            "role_id" => 1,
            "verification_code" =>  $verify_code
        ];

        Mail::to($request['email'])->send(new SendMailVerification(['code' => $verify_code]));
        User::create($data);
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
