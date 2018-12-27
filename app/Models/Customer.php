<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// 0. Tambahin ginian di model
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    protected $table = 'customers';
}
