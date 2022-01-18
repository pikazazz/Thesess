<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class calendar extends Model
{
    protected $table = 'calendar';
    protected $dates = ['start_date', 'end_date'];

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'start_date',
        'end_date',
        'backgroundColor',
        'borderColor',
        'allDay',
        'unit',
        'year',
        'type',
        'slug'

    ];
}
