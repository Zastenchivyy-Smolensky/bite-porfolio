<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Like;
use App\Models\User;
class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "product_id",
        "user_id",
        "created_at",
        "updated_at",
    ];
    public function user()
    {
        return $this->belongsTo("App\Models\User");
    }

    public function likes()
    {
        return $this->hasMany("App\Models\Like");
    }

    public function isLikedBy($user): bool{
        return Like::where('user_id', $user->id)->where('product_id', $this->id)->first() !==null;
    }

}
