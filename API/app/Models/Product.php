<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'price','sale_price','regular_price', 'slug','average_rating', 'short_description', 'specification', 'status',
        'weight', 'dimensions', 'inStock', 'description', 'imagePaths', 'category_id',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_products')
            ->withPivot('quantity');
    }
}
