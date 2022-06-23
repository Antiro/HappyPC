<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceApplications extends Model
{
    use HasFactory;
    protected $fillable = ['id','service_id', 'application_id','worker_id'];
    public $timestamps = false;

    public function application()
    {
        return $this->belongsTo(Application::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function worker()
    {
        return $this->belongsTo(Worker::class);
    }

    public function getPricePositionAttribute()
    {
        return (int)$this->product->price;
    }
}
