<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [

        'text',
        'user_id',
        'status_id',
        'created_at',
        'service_id',
        'evaluation_id',
        'application_id',
    ];

    public function getShortTextAttribute(): string
    {
        return mb_substr($this->text, 0, 38) . '...';
    }

    public function getDateReviewAttribute()
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

    public function evaluation()
    {
        return $this->belongsTo(Evaluation::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public static function allReal()
    {
        return Review::where('evaluation_id', '!=', null);
    }
}
