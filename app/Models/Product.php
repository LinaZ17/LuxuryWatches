<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'id',
        'title',
        'price',
        'in_stock',
        'description'
    ];

    public function images() //один ко многим
    {
        return $this->hasMany(ProductImage::class);
    }

    public function catalog() //один ко многим
    {
        return $this->belongsTo(Catalog::class, 'catalog_id');
    }

    public function getPrice()
    {
        if (!is_null($this->pivot)){
            return $this->pivot->count * $this->price;
        }
        return $this->price;
    }
}
