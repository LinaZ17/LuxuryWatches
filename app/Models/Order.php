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

    //    Здесь мы получаем подсчет полной стоимости корзины
    public function getFullPrice()
    {
        $sum = 0;
        foreach ($this->products as $product){
            $sum += $product->getPrice();
        }
        return $sum;
    }

    // далее прописываем этот метод в контроллере BasketController в методе  public function basketConfirm(Request $request)
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
