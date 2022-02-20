<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;

    protected $table = 'catalogs';

    protected $fillable = [
        'id',
        'title',
        'alias',

    ];

    public function products() //один ко многим
    {
        return $this->hasMany(Product::class);
    }
}
