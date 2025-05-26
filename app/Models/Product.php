<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Support\Address;

class Product extends Model
{
    protected function pname():Attribute{
        // return Attribute::make(
        //     get: fn (string $value) => ucfirst($value),
        // );
    }
    protected function address():Attribute{
        return Attribute::make(
            get: fn (mixed $value , array $attributes) => new Address(
                $attributes['pname'],
            )
        );
    }
    public $table="products";
    public $timestamps = false;
}
