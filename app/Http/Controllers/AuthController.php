<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Mail\SendMailVerification;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends BaseController
{
    public function index() {
        //gnalu e logini ej
        return view("auth.login");
    }

    public function register_view() {
        //gnalu e registraciayi ej
        return view("auth.register");
    }

    public function verify_view() {
        return view("auth.verify");
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
        $store = User::create($data);
        if($store) {
            return redirect()
                ->route("verify_view")
                ->with("success", "Your account successfully created. Check yor email for verification");
        }
    }

    public function login(LoginRequest $request) {
        //kazmakerpelu e login
        $data = [
            "email" => $request['email'],
            "password" => $request['password'],
        ];
        if(Auth::attempt($data)) {
            return redirect()->route("dashboard");
        } else {
            return redirect()
                ->back()
                ->with("fail", "Incorrect login or password!");
        }
    }

    public function verify(Request $request) {
        //kazmakerpelu e ogtvoxi verifikacia
        $code = $request['verify_code'];
        //SELECT * FROM users WHERE verify_code = j7eb0f;
        $user = User::where("verification_code", "=", $code);

        // UPDATE users SET `is_verified` = 1, `verification_code` = null WHERE id = user_id
        $verify = $user->update([
            "is_verified" => 1,
            "verification_code" => 'null'
        ]);
        if($verify) {
            return redirect()
                ->route("index")
                ->with("success", "Your profile successfully verified");
        } else {
            return redirect()->back()->with("fail", "Incorrect code!");
        }

    }

    public function logout() {
        Auth::logout();
        return redirect()->route("index");
    }
}
