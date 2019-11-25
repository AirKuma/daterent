<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    protected $table = 'advertisements';
	protected $fillable = ['describe','imageurl','navigateurl','advertiser','hitpoint'];
}
