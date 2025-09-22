<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class retails extends Model
{
    protected $fillable = ['product_id', 'satuan', 'qty_per_grosir', 'harga_ecer'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
