<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index() {
        $subjects = Subject::get();
        return response()->json($subjects);
    }

    public function store(Request $request) {
        $store = Subject::create(['name' => $request['name']]);
        if($store) {
            return response()->json(['msg' => 'Successfully created']);
        }
    }
}
