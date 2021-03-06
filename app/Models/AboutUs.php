<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;

    protected $fillable = [

        'img',
        'title',
        'description',

    ];

    public $timestamps = false;

    public function getShortDescriptionAttribute(): string
    {
        return mb_substr($this->description, 0, 38) . '...';
    }
}
