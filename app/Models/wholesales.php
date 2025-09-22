<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class wholesales extends Model
{
    protected $fillable = ['product_id', 'satuan', 'harga_grosir'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
