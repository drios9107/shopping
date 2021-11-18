<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Shoe;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'shoe_id',
        'amount',
        'value',
        'user_id',
    ];

    public function Shoe()
    {
        return $this->belongsTo(Shoe::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
