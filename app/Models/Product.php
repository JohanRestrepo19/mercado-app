<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $appends = ['short_description'];

    // NOTE: Accesors
    public function getShortDescriptionAttribute()
    {
        $short = str($this->description)->substr(0, 27);
        return "{$short}...";
    }

    // NOTE: Relationships
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function sales()
    {
        return $this->hasMany(Sale::class, 'product_id', 'id');
    }
}
