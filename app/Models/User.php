<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory,HasFactory,Notifiable;

    protected $fillable = [
        'email',
        'name',
        'phone',
        'img_id',
        'password',
        'role_id',
    ];

    public $timestamps = false;

    protected $hidden = [
        'password',
    ];


    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function img()
    {
        return $this->belongsTo(ImagesOfUser::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function application()
    {
        return $this->hasMany(Application::class);
    }
}
