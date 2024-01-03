<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metting extends Model
{
    protected $table = 'mettings';
    protected $primaryKey = 'id';
    protected $fillable = ['organization', 'name',  'designation', 'address', 'phone', 'phone1', 'email','number','created_at','updated_at'];

}