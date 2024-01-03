<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
   
    protected $tabled = 'members';
    protected $primaryKey = 'id';
    protected $fillable = ['eid', 'group','leader','team'];
}