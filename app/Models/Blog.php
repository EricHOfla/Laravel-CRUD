<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
  protected $table ='_blogs';

  protected $fillable =[
    'name',
    'email',
    'password',
  ];
 
}
