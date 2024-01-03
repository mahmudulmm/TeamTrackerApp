<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $tabled = 'invoices';
    protected $primaryKey = 'id';
    protected $fillable = ['cid', 'eid', 'pid','mettingid', 'invoiceid', 'total', 'due', 'advance', 'date', 'discount', 'extra', 'vat', 'lastpay', 'expiredat'];

}