<?php

namespace App\Models\admins;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    use HasFactory;


    protected $table = 'news';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [

        'category_id',
        'news_name',
        'news_detail',
        'creator'

    ];
}
