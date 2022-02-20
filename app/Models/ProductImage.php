<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $table = 'product_images';

    protected $fillable = [
        'id',
        'img',
        'product_id',

    ];

    //один ко многим обратное отношение
    public function products()
    {
        $this->belongsTo(Product::class);
    }
}
