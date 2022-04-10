<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Like;
class Product extends Model
{
    use HasFactory;

    public function likes()
    {
        return $this->hasMany("App\Models\Like");
    }

    public function isLikedBy($user): bool{
        return Like::where('user_id', $user->id)->where('product_id', $this->id)->first() !==null;
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
