<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model{
    public $table = 'category_level_1';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public $timestamps = false;
}
