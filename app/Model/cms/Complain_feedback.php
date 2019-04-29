<?php

namespace App\Model\cms;

use Illuminate\Database\Eloquent\Model;

class Complain_feedback extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['complian_type_id','eng_feedbak','customer_feedback'];
}
