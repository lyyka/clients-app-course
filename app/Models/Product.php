<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
//    protected $table = 'custom_naziv_tabele';

    protected $casts = [
        'enabled' => 'boolean' // 1 / 0 -> true / false
    ];

    public function clients()
    {
        return $this->belongsToMany(Client::class, 'client_products');
    }
}
