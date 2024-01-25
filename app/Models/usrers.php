<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;
class usrers extends Model
{
    protected $connection = 'mongodb'; //if defualt then not need
    protected $collection = 'users';
    protected $fillable=[
        'name',
        'email',
        'phone',
        'date'
    ];
    use HasFactory;
}
