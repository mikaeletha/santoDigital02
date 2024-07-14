<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'adventureworks_products';
    public $timestamps = false;

    protected $fillable = [
        'ProductKey',
        'ProductSubcategoryKey',
        'ProductSKU',
        'ProductName',
        'ModelName',
        'ProductDescription',
        'ProductColor',
        'ProductSize',
        'ProductStyle',
        'ProductCost',
        'ProductPrice',
    ];

    public function subcategory()
    {
        return $this->belongsTo(ProductSubcategory::class, 'ProductSubcategoryKey', 'ProductSubcategoryKey');
    }
}
