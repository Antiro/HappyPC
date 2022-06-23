<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkersClass extends Model
{
    use HasFactory;
    protected $fillable = [

        'worker_id',
        'class_id',
    ];

    public $timestamps=false;

}
