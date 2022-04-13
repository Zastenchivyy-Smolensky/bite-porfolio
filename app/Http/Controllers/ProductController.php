<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        $user_id = Auth::id();
        $user = User::all();
        $products ->load("user");
        $params=[
            "products"=>$products,
            "user_id"=>$user_id,
            "user" => $user,
        ];
        return view("index",$params);
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
        $products = new Product;
        $products->title = $request->title;
        $products->content = $request->content;
        $products->span = $request->span;
        $products->genre = $request->genre;
        $products->tech = $request->tech;
        $filename= $request->file("thefile")->store("public");
        $products->image = str_replace("public/",'', $filename);
        $products->github = $request->github;
        $products->link = $request->link;
        $products->user_id = Auth::id();
        $products->save();
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

    public function update(Request $request, Product $product)
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
        $product->update([
            "title" => $request->title,
            "content" => $request->content,
            "image" => $path,
            "genre" => $request->genre,
            "tech" => $request->tech,
            "github" => $request->github,
            "link" => $request->link
        ]);
        return redirect("/");
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route("product.index");
    }

    public function like(Request $request)
    {
        $user_id = Auth::user()->id;
        $product_id = $request->product_id;
        $already_liked = Like::where('user_id', $user_id)->where('product_id', $product_id)->first(); 
        if (!$already_liked){
            $like = new Like;
            $like->product_id = $product_id;
            $like->user_id = $user_id;
            $like->save();
        }else{
            Like::where("product_id",$product_id)->where("user_id",$user_id)->delete();
        };
        $product_likes_count = Product::withCount("likes")->findOrFail($product_id)->likes_count;
        $params=[
            "product_likes_count" => $product_likes_count,
        ];
        return response()->json($params);
    }
}
