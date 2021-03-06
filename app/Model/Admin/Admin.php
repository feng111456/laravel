<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table    = 'admin';
    protected $primaryKey = 'id';
    public $timestamps = false;
    //protected $fillable = ['name'];//允许被批量赋值
    protected $guarded = [];//不允许被批量赋值
}
