<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    protected $table = 'orders'; 
    protected $primaryKey = 'id';
   protected $fillable = ['eid', 'mid', 'pid', 'cid','type', 'pt_type', 'price', 'payment', 'total', 'advance', 'due', 'billing_date', 'agreement', 'delivery', 'monthly_fee', 'status'];

}