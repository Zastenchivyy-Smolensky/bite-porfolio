<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view("index",["products"=>$products]);
    }
    public function add()
    {
        return view("add");
    }
    public function create(Request $request){
        $data = $request->all();
        $image = $request->file("image");
        if($request->hasFile("image")){
            $path=\Storage::put("/public",$image);
            $path=explode("/",$path);
        }else{
            $path=null;
        }
        $product_id = Product::insertGetId([
            "title" => $data["title"],
            "content"=> $data["content"],
            "image" => $path[1],
            "span" => $data["span"],
            "genre" => $data["genre"]
            
        ]);
        return redirect("/products");
    }

    public function show($id){
        $product = Product::find($id);
        return view("show",["products"=>$product]);
    }
    public function edit($id, $product){
        $product = Product::find($id);
        return view('products/edit',[
            "prodcut" => $product
        ]);
    }
    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect("/products");
    }
}
