<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chrizo extends Model
{
   protected $table= 'abayuza';
   protected $fillable= [
    'name',
    'email',
    'password',
   ];
}
