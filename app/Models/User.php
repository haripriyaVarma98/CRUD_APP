<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);

    }

    public function address()
    {
        return $this->hasMany(UserAddress::class);
    }

    public function scopeFilter($query, $search)
    {
        $query->when($search ?? false, fn ($query, $search) =>
            $query->where(fn ($query) =>
                $query->where('name', 'like', '%'.$search.'%')
                ->orWhere('username', 'like', '%'.$search.'%')
                ->orWhere('email', 'like', '%'.$search.'%')
                ->orWhereHas('address', fn ($query)=>
                    $query->where('address', 'like', '%'.$search.'%')
                )
            )
        );
            
    }
}
