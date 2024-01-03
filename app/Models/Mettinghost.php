<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mettinghost extends Model
{
    protected $table = 'mettinghosts';
    protected $primaryKey = 'id';
    protected $fillable = ['eid', 'type'];

}