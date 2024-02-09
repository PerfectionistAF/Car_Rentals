<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Beverage extends Model
{
    use HasFactory;

    protected $table = "beverages";
    protected $fillable = ['title', 'content', 'price', 'published',
    'special', 'item_category', 'image'];
    protected $casts = [
        'published' => 'boolean',
        'special' => 'boolean'
    ];
    public function category():BelongsTo{
        return $this->belongsTo(Category::class);
    }
        //to access all beverages for a specific category
}
