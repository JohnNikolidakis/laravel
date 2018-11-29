<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class garbage_bin_register extends Model
{
	protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'garbage_bin_register';
	protected $fillable = ['type', 'capacity'];	
}
