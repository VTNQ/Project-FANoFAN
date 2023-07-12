<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rating extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable=['id_rating','id_product','rating','id_feedback',];
    protected $primaryKey='id_rating';
    protected $table='rating';
}
