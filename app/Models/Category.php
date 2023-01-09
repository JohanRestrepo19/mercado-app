<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    // NOTE: Relationships
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function randomProducts()
    {
        return $this->hasMany(Product::class, 'category_id', 'id')
            ->inRandomOrder()
            ->where('stock', '>', '0')
            ->limit(4);
    }
}
