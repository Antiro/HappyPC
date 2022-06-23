<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyClass extends Model
{
    use HasFactory;

    public function workers()
    {
        return $this->belongsToMany(Worker::class, 'workers_classes', 'class_id','worker_id');
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
