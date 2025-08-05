<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ShopUser extends Pivot
{
    protected $table = 'shop_user';

    protected $fillable = [
        'shop_id',
        'user_id',
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
