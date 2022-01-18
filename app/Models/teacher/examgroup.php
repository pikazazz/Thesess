<?php

namespace App\Models\teacher;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class examgroup extends Model
{

    protected $table = 'exam_group';
    use HasFactory;


    protected $fillable = [
        'id',
        'group',
        'exam_id',
        'type',
        'summation',
        'status',
    ];
}
