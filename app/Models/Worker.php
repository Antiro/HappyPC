<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;

    protected $fillable = [

        'img',
        'name',
        'description',

    ];

    public $timestamps = false;

    public function myClasses(){
        return $this->belongsToMany(MyClass::class, 'workers_classes', 'worker_id', 'class_id');
    }

    public function implodeClasses($worker){
        return (implode(' и ', $worker->myClasses()->pluck('name')->toArray()));
    }

    public function getShortDescriptionAttribute(): string
    {
        return mb_substr($this->description, 0, 38) . '...';
    }
}
