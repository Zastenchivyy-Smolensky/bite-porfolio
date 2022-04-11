<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
class UsersController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user = User::find($user->id);
        $products = Product::where("user_id",$user->id)
            ->orderBy("created_at","desc")
            ->paginate(10);
            return view("users.show",[
                "user_name" => $user->name,
                "products" => $products,
            ]);
    }
}
