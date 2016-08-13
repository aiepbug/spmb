<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mstspmb_rule extends Model
{
	protected $table  = 'mstspmb_rule';
	protected $fillable = ['*'];
	protected $dateFormat = 'd/m/Y';
}
