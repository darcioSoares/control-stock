<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'actived',
        'roles',   
        'avatar',   
        //'company_id',
        'responsible_to_insert_id',
        'last_updated_id'
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

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    //protected $with = ['company'];

    // public function company()
    // {
    //     return $this->belongsTo(Company::class);
    // }

    
    public function responsible_insert()
    {
        return $this->belongsTo(User::class,'responsible_to_insert_id');
    }

    public function responsible_update()
    {
        return $this->belongsTo(User::class,'last_updated_id');
    }
}
