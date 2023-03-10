<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $casts = [
        'date_of_birth' => 'date',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'client_products');
    }
}
