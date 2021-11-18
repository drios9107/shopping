<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usage;
use App\Models\Brand;

class Shoe extends Model
{
    use HasFactory;

    protected $fillable = [
        'color',
        'size',
        'price',
        'brand_id'
    ];

    public function Usage()
    {
        return $this->belongsToMany(Usage::class);
    }

    public function Brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
