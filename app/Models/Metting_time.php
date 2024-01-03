<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metting_time extends Model
{
   
    protected $tabled = 'metting_times';
    protected $primaryKey = 'id';
    protected $fillable = ['host', 'mid',  'visit', 'product', 'time', 'file', 'note','status','metting','duration','feedBack','group','type','in','out'];
}