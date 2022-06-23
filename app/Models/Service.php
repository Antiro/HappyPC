<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'price',
        'class_id',
        'description',

    ];

    public $timestamps = false;

    public function myClasses(){
        return $this->belongsToMany(MyClass::class, 'workers_classes', 'worker_id', 'class_id');
    }

    public function ServiceClass(){
        return $this->belongsTo(MyClass::class, 'class_id','id');
    }

    public function implodeClasses($s){
        return (implode(' и ', $s->myClasses()->pluck('name')->toArray()));
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function imagesOfServices()
    {
        return $this->hasMany(ImagesOfService::class);
    }

    public function application()
    {
        return $this->hasMany(Application::class);
    }

    public function getShortDescriptionAttribute(): string
    {
        return mb_substr($this->description, 0, 30) . '...';
    }

    public static function allReal()
    {
        return Service::where('id', '>', 0);
    }
}
