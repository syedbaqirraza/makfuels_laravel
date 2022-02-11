<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
   protected $fillable=[
            'invoice_type',
            'invoice_description',
            'invoice_file',
            'user_id',
            'created_at'
    ];


    public function getInvoiceTypeAttribute($value)
    {
        return strtoupper($value);
    }
}
