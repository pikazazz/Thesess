<?php

namespace App\Models\student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class request_teacher extends Model
{
    use HasFactory;

    protected $table = 'request_teacher';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        
        'request_sender',
        'request_receiver',
        'status'
    ];

}
