<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ProductOrderModel extends Model{
    public $table = 'product_order';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public $timestamps = false;
}
