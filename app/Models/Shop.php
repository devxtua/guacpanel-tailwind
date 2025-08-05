<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'shopify_domain',
        'access_token',
        'is_shopify',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)
            ->using(ShopUser::class)
            ->withTimestamps();
    }

}
