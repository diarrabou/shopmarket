<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'nom',
        'description',
        'prix',
        'stock',
        'image',
        'category_id',
        'vendeur_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function vendeur()
    {
        return $this->belongsTo(User::class, 'vendeur_id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}