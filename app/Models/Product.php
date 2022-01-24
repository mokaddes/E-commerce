<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'subcategory_id',
        'brand_id',
        'product_code',
        'product_name',
        'product_details',
        'product_quantity',
        'product_size',
        'product_color',
        'selling_price',
        'discount_price',
        'video_link',
        'main_slider',
        'hot_deal',
        'best_rated',
        'mid_slider',
        'hot_new',
        'trend',
        'image_one',
        'image_two',
        'image_three',
        'status',

    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
