<?php

namespace App\Models\dashboard;

use App\Models\dashboard\Factory;
use App\Models\dashboard\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
    ];


    public function factories(): HasMany
    {
        return $this->hasMany(Factory::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
