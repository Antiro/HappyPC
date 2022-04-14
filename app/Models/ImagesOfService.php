<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagesOfService extends Model
{
    use HasFactory;

    protected $fillable = [
        'img',
        'service_id',
    ];

    public $timestamps = false;

    public function services()
    {
        return $this->belongsTo(Service::class);
    }
}
