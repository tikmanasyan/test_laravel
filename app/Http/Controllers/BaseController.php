<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected function make_hashed_code($length) {
        $keys = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", 0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
        $code = "";
        for($i = 1; $i <= $length; $i++) {
            $code .= $keys[rand(0, count($keys) - 1)];
        }
        return $code;
    }
}
