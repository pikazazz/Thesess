<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class point_transection extends Model
{
    protected $table = 'point_transection';

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'group',
        'exam_id',
        'type',
        'teacher_id',
        'point',
    ];


}
