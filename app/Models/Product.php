<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function movements()
    {
        return $this->hasMany(Movement::class);
    }
    protected $fillable = ['name','sku','stock','unit','category','initial_stock'];
}
