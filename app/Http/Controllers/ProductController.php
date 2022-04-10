<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
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
        return redirect("/");
    }

    public function show($id){
        $product = Product::find($id);
        return view("show",["products"=>$product]);
    }

    public function edit($id){
        $product = Product::find($id);
        return view('edit',["product"=>$product]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $image = $request->file("image");
        $path=$request->image;
        if($request->hasFile("image")){
            $path=\Storage::put("/public",$image);
            $path=$image->store("product","public");
        }else{
            $path=null;
        }
        Product::where("id",$id)->update([
            "title" => $data["title"],
            "content"=>$data["content"],
            "image" => $path,
            "span" => $data["span"],
            "genre" => $data["genre"],
        ]);
            
        return redirect()->route("product.edit", $product->id);
    }
    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route("product.index");
    }
}
