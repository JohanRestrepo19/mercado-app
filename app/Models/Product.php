<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'image',
        'price',
        'stock',
    ];

    protected $appends = ['short_description', 'has_image'];

    // NOTE: Accesors
    public function getShortDescriptionAttribute()
    {
        $short = str($this->description)->substr(0, 27);
        return "{$short}...";
    }

    public function getHasImageAttribute()
    {
        if ($this->image === "null" || !$this->image) return false;
        return true;
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
