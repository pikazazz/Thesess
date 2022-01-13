<?php

namespace App\Models\publics;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class messagelogs extends Model
{
    use HasFactory;
    protected $table = 'message_log';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [

        'id',
        'group',
        'sender',
        'massage',
        'see'

    ];
}
