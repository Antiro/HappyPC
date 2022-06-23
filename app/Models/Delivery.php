<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'description',

    ];

    public function getShortDescriptionAttribute(): string
    {
        return mb_substr($this->description, 0, 38) . '...';
    }
}
