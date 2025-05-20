<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{

    protected $table = 'services'; // always plural (optional)

    protected $fillable = [     // required for mass assignment
        'name'
    ];
}




