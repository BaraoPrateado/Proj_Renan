<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'stock',
        'price',
        'supplier_id',
    ];

    function supplier():BelongsTo {
        return $this->belongsTo(Product::class,  'supplier_id');
    }
}
