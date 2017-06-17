<?php

namespace quiniela;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
     protected $table = 'admins';
     protected $fillable = ['username', 'numeroEmpleado'];
 	 protected $primaryKey = 'username';
     public $incrementing = false;
 } 

