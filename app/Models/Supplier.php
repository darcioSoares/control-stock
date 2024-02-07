<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'cnpj',        
        'name',
        'email',
        'last_name',
        'social_reason',
        'fantasy_name',
        'phone',
        'email',
        'status',

        'responsible_to_insert_id',
        'last_updated_id'
    ];
}
