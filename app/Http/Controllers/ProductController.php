<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index() {
        $products = DB::table("products")
            ->join("categories", "products.category_id", "=", "categories.id")
            ->select(
                "products.name AS product",
                "products.price AS price",
                "categories.name AS category")
            ->get();
        return view("dash.products.index", ['products' => $products]);
    }

    public function create() {
        $categories = DB::table("categories")
            ->select("id AS category_id", "name AS category_name")
            ->get();
        return view("dash.products.create", ['categories' => $categories]);
    }

    public function store(Request $request) {
        $image = "";
        if($request->file("image")) {
            $ext = $request->file("image")->extension();
            $image = "product_" . time() . "." . $ext;
            $request->file("image")->move(
                public_path("assets/uploads/"), $image);
        }

        $store = DB::table("products")->insert([
            "name" => $request['name'],
            "description" => $request['description'],
            "image" => $image,
            "price" => $request['price'],
            "qt" => $request['qt'],
            "category_id" => $request['category_id'],
            "created_at" => now(),
        ]);

        if($store) {
            return redirect()->route("all-products")->with("success", "Product created");
        }
    }

    public function filter_by_category($id) {
        $products = DB::table("products")
            ->join("categories", "products.category_id", "=", "categories.id")
            ->select(
                "products.name AS product",
                "products.price AS price",
                "categories.name AS category")
            ->where("products.category_id", "=", $id)
            ->get();
        return view("dash.categories.category_products", ['products' => $products]);
    }
}
