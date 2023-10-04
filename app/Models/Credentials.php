<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credentials extends Model
{
    use HasFactory;

    protected $table = 'credentials';
    protected $fillable = [ 
        'company_name',
        'email',
        'directory_name',
        'database',
        'username',
        'password',
    ];
}
