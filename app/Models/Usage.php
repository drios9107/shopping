<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Shoe;

class Usage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function Shoe()
    {
        return $this->belongsToMany(Shoe::class);
    }
}
