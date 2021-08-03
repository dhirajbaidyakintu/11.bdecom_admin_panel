<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ImageModel extends Model {
    public $table = 'images';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public $timestamps = false;
}
