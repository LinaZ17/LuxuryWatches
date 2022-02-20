<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;

//Связь «многие ко многим» таблицы `basket` с таблицей `products`
    public function products() {
        return $this->belongsToMany(Product::class);
    }
}
