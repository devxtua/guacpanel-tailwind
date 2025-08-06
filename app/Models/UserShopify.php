<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Osiset\ShopifyApp\Contracts\ShopModel as IShopModel;
use Osiset\ShopifyApp\Traits\ShopModel;

class UserShopify extends Authenticatable implements IShopModel
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, ShopModel;

    protected $table = 'users_shopify';

    protected $fillable = [
        'name',
        'email',
        'password',
        'plan_id',
        'shopify_grandfathered',
        'shopify_namespace',
        'shopify_freemium',
        'theme_support_level',
    ];

    protected $casts = [
        'shopify_grandfathered' => 'boolean',
        'shopify_freemium' => 'boolean',
        'password_updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
