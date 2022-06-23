<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id',
        'comment',
        'status_id',
        'created_at',
    ];

    public function getDateApplicationAttribute()
    {
        return $this->created_at->format('d.m.Y');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function getShortCommentAttribute(): string
    {
        return mb_substr($this->comment, 0, 30) . '...';
    }

    public function serviceApplications(){
        return $this->hasMany(ServiceApplications::class);
    }

    public static function allReal()
    {
        return Application::where('id', '>', 0);
    }
}
