<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAsset extends Model
{
    use HasFactory;
    protected $table = 'product_assets';

    public function asset()
    {
        return $this->belongsTo(Asset::class, 'asset_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}