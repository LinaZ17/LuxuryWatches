<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'id',
        'status',
        'name',
        'phone',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
    }

    //  подсчет полной стоимости корзины
    public function getFullPrice()
    {
        $sum = 0;
        foreach ($this->products as $product){
            $sum += $product->getPrice();
        }
        return $sum;
    }

    public function saveOrder($name, $phone)
    {
       if ($this->status == 0){
           $this->name = $name;
           $this->phone = $phone;
           $this->status = 1;
           $this->save();
           session()->forget('orderId');
       }else{
           return false;
       }
    }
}
