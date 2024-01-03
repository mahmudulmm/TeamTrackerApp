<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statement extends Model
{
   
    protected $table = 'statements';
    protected $primaryKey = 'id';
    protected $fillable = ['aid','cid','eid','order','balance','date','paid'];
}