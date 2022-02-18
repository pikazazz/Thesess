<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class deploy extends Model
{
    protected $table = 'deploy_list';
    use HasFactory;

    protected $fillable = [
        'Group',
        'Fornt_End_Path',
        'Back_End_Path',
        'Type_Fornt',
        'Type_BackEnd',
        'User_Database',
        'Password_Database',
        'Database',
        'Database_Type'
    ];
}
