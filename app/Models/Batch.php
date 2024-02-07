<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;

    protected $fillable = [
        'lot_number',
        'production_information',
        'batch_code',
        'individual_serial_number',
        'due_date',
        
        'responsible_to_insert_id',
        'last_updated_id'
    ];
}
