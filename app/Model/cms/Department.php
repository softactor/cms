<?php

namespace App\Model\cms;

use Illuminate\Database\Eloquent\Model;

class Department extends Model{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','details'];
}
