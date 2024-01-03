<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    protected $tabled = 'holidays';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'start_date', 'end_date'];
}
