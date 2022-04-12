<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = Auth::id();
        $user = DB::table('users')->find($id);
        return view('home',["user"=>$user]);
    }
    public function my_page_update(Request $request)
    {
        if($request->hasFile('top_image')){
            $id = Auth::id();
            $photo_path = $request->file('top_image')->store('public/top_file');
            $top_image_pass2 = basename($photo_path);
            $affected = DB::table('users')
                ->where('id', $id)
                ->update(['profile_image' => $top_image_pass2]);
            // 画像に表示させる
            return redirect("/home")->with([
                "top_image_pass" => $top_image_pass2 
            ]);
        }
    }
}
