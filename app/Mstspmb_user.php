<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mstspmb_user extends Model
{
    //
	protected $table  = 'mstspmb_user';
    protected $fillable = ['*'];
    protected $dateFormat = 'd/m/Y';
}
