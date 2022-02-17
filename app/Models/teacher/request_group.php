<?php

namespace App\Models\teacher;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class request_group extends Model
{

    protected $table = 'request_teacher';
    use HasFactory;

    protected $fillable = [
        'id',
        'std_receiver',
        'std_sender',
    ];

}
