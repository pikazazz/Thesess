<?php

namespace App\Models\student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class request_group extends Model
{
    use HasFactory;

    protected $table = 'request_group';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [

        'std_sender',
        'std_receiver',
        'status',

    ];


}
