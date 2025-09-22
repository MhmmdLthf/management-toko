<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['gambar','nama_barang', 'stok'];

    public function retails()
    {
        return $this->hasOne(retails::class);
    }

    public function wholesales()
    {
        return $this->hasOne(Wholesales::class);
    }

    /**
     * Akses stok yang sudah otomatis menampilkan
     * grosir 
     */
    public function getDisplayStockAttribute()
{
    if ($this->retails && $this->wholesales) {
        $qtyPerGrosir = $this->retails->qty_per_grosir;

        $jumlahGrosir = intdiv($this->stok * $qtyPerGrosir, $qtyPerGrosir);
        $sisaEcer = ($this->stok * $qtyPerGrosir) % $qtyPerGrosir;

        if ($sisaEcer > 0) {
            return $jumlahGrosir . ' ' . $this->wholesales->satuan . ' + ' .
                   $sisaEcer . ' ' . $this->retails->satuan;
        }
        return $jumlahGrosir . ' ' . $this->wholesales->satuan;
    }

    return $this->stok; // fallback
}


}
