<?php

namespace App\Models\student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class groupModel extends Model
{
    use HasFactory;

    protected $table = 'group';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [

        'std_first',
        'std_second',
        'teacher',
        'co_teacher',
        'co_teacher_2',
        'co_teacher_3',
        'group_name',
        'path_img_group',
        'path_proposal',
        'path_ch1',
        'path_ch2',
        'path_ch3',
        'path_ch4',
        'path_ch5',
        'path_poster',
        'hosting_project'

    ];


}
