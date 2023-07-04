<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    protected $table='photo';
    protected $PrimaryKey='id_photo';
    protected $FillTable=['value','status','id_product'];
    public $timestamps=false;

}
