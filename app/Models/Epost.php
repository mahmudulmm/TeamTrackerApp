<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Epost extends Model
{
    protected $tabled = 'eposts';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'salary', 'code','status'];
}