<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function like_exist($id, $product_id)
    {
        $exist = Like::where("user_id","=",$id)->where("product_id","=",$product_id)->get();
        if(!$exist->isEmpty()){
            return true;
        }else{
            return false;
        }
    }
}
