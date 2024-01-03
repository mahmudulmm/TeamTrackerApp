<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $tabled = 'leaves';
    protected $primaryKey = 'id';
    protected $fillable = ['eid', 'type', 'from', 'to', 'day', 'dremaining', 'note', 'status'];
   
}

