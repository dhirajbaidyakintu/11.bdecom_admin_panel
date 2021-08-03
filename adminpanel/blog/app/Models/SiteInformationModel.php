<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class SiteInformationModel extends Model{
    public $table = 'siteinfo';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public $timestamps = false;
}
