<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'service_id',
        'status_id',
        'comment',
    ];

    public $timestamps = false;

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

}
