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

    //один ко многим
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
