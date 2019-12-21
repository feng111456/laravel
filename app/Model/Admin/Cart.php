<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table    = 'cart';
    protected $primaryKey = 'id';
    public $timestamps = false;
    //protected $fillable = ['name'];//允许被批量赋值
    protected $guarded = [];//不允许被批量赋值
}
