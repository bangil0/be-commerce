<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
    protected $fillable = [
    	'id_customers',
    	'id_products',
    	'created_at',
    	'updated_at'
    ];
}
