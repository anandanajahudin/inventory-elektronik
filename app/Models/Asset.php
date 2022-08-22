<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;
    protected $table = 'assets';

    public function product_assets()
    {
        return $this->hasMany(ProductAsset::class, 'id_asset', 'id');
    }

    public function categories()
    {
        return $this->hasOne(Category::class, 'id_asset', 'id');
    }
}