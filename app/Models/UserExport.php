<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserExport extends Model
{
    protected $table = 'export_user';

    use HasFactory;
    protected $fillable = [
        'username',
        'password',
    ];
}
