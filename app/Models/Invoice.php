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
            'created_at',
            'updated_at',
            'fuel_id',
            'grand_total',
            'total_gallon',
    ];


    public function getInvoiceTypeAttribute($value)
    {
        return strtoupper($value);
    }
    protected $casts = [
        'created_at' => 'date:m-d-Y',
    ];
}
