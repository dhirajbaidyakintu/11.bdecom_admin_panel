<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class SubCategoryModel extends Model{
    public $table = 'category_level_2';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public $timestamps = false;
}
