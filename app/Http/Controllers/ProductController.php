<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use App\Models\Like;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
class ProductController extends Controller
{
    public function index(){
  
        
        $data = [];
        $products = Product::withCount("likes")->orderBy("created_at","desc")->paginate(10);
        $like_model = new Like;
        $user_id = Auth::id();
        $user = User::all();
        $products ->load("user");
        $params=[
            "products"=>$products,
            "user_id"=>$user_id,
            "user" => $user,
            "like_model" => $like_model,
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

    public function edit(Request $request){
        $user = Auth::user();
        $product = Product::findOrFail($request->id);
        return view('edit',["product"=>$product]);
    }

    public function update(Request $request,Product $product)
    {
        $data = $request->all();
        $image = $request->file("image");
        if($request->hasFile("image")){
            \Storage::delete('/public' . $product->image);
            $path = $request->file("image")->store("/public");
            $product->image=basename($path);
        }else{
            $path=null;
        }
        $product = Product::find($request->id);
        $product->title = $request->title;
        $product->content = $request->content;
        $filename= $request->file("thefile")->store("public");
        $product->image = str_replace("public/",'', $filename);
        $product->span = $request->span;
        $product->genre = $request->genre;
        $product->tech = $request->tech;
        $product->github = $request->github;
        $product->link = $request->link;
        $product->save();
        return redirect()->route("product.index",$product);
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route("product.index");
    }
    public function like(Request $request)
    {
        $id = Auth::user()->id;
        $product_id = $request->product_id;
        $like = new Like;
        $product = Product::findOrFail($product_id);
        if($like->like_exist($id, $product_id)){
            $like = Like::where("product_id", $product_id)->where("user_id",$id)->delete();
        }else{
            $like = new Like;
            $like->product_id = $request->product_id;
            $like->user_id = Auth::user()->id;
            $like->save();
        }
        $productLikeCount = $product->loadCount("likes")->like_count;
        $json = [
            "productLikesCount" =>$productLikesCount,
        ];
        return response()->json($json);
    }
}
